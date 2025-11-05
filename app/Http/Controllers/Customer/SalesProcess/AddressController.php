<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Models\Address;
use App\Models\Province;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use App\Models\Market\CartItem;
use App\Models\Market\Delivery;
use App\Models\Market\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Market\CommonDiscount;
use Illuminate\Contracts\Cache\Store;
use App\Http\Requests\Customer\SalesProcess\StoreAddressRequest;
use App\Http\Requests\Customer\SalesProcess\UpdateAddressRequest;
use App\Http\Requests\Customer\SalesProcess\ChooseAddressAndDeliveryRequest;

class AddressController extends Controller
{
    public function addressAndDelivery()
    {
        $userId = auth()->id();

        // دریافت آیتم‌های سبد خرید با تعداد، فقط یک کوئری
        $cartItems = CartItem::with('product')
            ->where('user_id', $userId)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.sales-process.cart');
        }

        // سایر داده‌ها
        $user = auth()->user();
        $provinces = Province::orderBy('name')->get();
        $deliveryMethods = Delivery::where('status', 1)->get();

        return view(
            'customer.sales-process.address-and-delivery',
            compact('cartItems', 'provinces', 'user', 'deliveryMethods')
        );
    }


    public function getCities(Province $province)
    {
        $cities = $province->cities;

        return response()->json([
            'status' => $cities->isNotEmpty(),
            'cities' => $cities
        ]);
    }


    public function addAddress(StoreAddressRequest $request)
    {
        $user = auth()->user();

        // merge user_id و اصلاح کد پستی
        $inputs = $request->validated();
        $inputs['user_id'] = $user->id;
        $inputs['postal_code'] = convertPersianToEnglish(convertArabicToEnglish($request->postal_code));

        // پر کردن اطلاعات گیرنده اگر خالی بود
        $inputs['recipient_first_name'] = $inputs['recipient_first_name'] ?? $user->first_name;
        $inputs['recipient_last_name']  = $inputs['recipient_last_name']  ?? $user->last_name;
        $inputs['mobile']               = $inputs['mobile'] ?? '0' . $user->mobile;

        Address::create($inputs);

        return redirect()->back();
    }



    public function updateAddress(Address $address, UpdateAddressRequest $request)
    {

        $inputs = $request->all();

        $inputs['user_id'] = auth()->user()->id;

        $inputs['postal_code'] = convertArabicToEnglish($request->postal_code);
        $inputs['postal_code'] = convertPersianToEnglish($inputs['postal_code']);

        if ($request->input('recipient_first_name') == null || $request->input('recipient_last_name') == null) {
            $inputs['recipient_first_name'] = auth()->user()->first_name;
            $inputs['recipient_last_name'] = auth()->user()->last_name;
            $inputs['mobile'] = '0' . auth()->user()->mobile;
        }


        $address->update($inputs);

        return redirect()->back();
    }


    public function chooseAddressAndDelivery(ChooseAddressAndDeliveryRequest $request)
    {
        $user = Auth::user();

        // شروع تراکنش
        DB::beginTransaction();

        try {
            $deliveryMethod = Delivery::findOrFail($request->delivery_id);
            $cartItems = CartItem::where('user_id', $user->id)->get();

            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'سبد خرید شما خالی است.');
            }

            // --- محاسبه قیمت‌ها ---
            $totals = $this->calculateCartTotals($cartItems);

            // --- تخفیف عمومی ---
            $commonDiscount = $this->getActiveCommonDiscount();
            $commonDiscountAmount = $this->calculateCommonDiscount($commonDiscount, $totals['final_price']);

            $finalPrice = $totals['final_price'] - $commonDiscountAmount;

            // --- ساخت اطلاعات سفارش ---
            $orderData = [
                'user_id'                               => $user->id,
                'delivery_id'                           => $deliveryMethod->id,
                'address_id'                            => $request->address_id,
                'order_amount'                          => $finalPrice,
                'payment_status'                        => 0,
                'order_discount_amount'                 => $totals['discount_price'],
                'order_common_discount_amount'          => $commonDiscountAmount,
                'order_total_products_discount_amount'  => $totals['discount_price'] + $commonDiscountAmount,
                'delivery_amount'                       => $deliveryMethod->amount,
                'common_discount_id'                    => $commonDiscount?->id,
                'order_status'                          => 0, // در انتظار پرداخت
            ];

            // --- ایجاد یا بروزرسانی سفارش ---
            $order = Order::updateOrCreate(
                ['user_id' => $user->id, 'order_status' => 0],
                $orderData
            );

            // --- بروزرسانی آیتم‌های سفارش ---
            $this->syncOrderItems($order, $cartItems);

            // تایید تراکنش
            DB::commit();

            return redirect()->route('customer.sales-process.payment');
        } catch (\Throwable $e) {
            // در صورت بروز خطا، تراکنش برگردانده می‌شود
            DB::rollBack();

            // برای دیباگ می‌تونی خط زیر رو موقتاً فعال کنی:
            // dd($e->getMessage());

            return redirect()->back()->with('error', 'خطایی در ثبت سفارش رخ داد. لطفاً دوباره تلاش کنید.');
        }
    }

    private function calculateCartTotals($cartItems)
    {
        $totalProductPrice = $totalDiscount = $totalFinalPrice = 0;

        foreach ($cartItems as $item) {
            $totalProductPrice += $item->cartItemProductPrice();
            $totalDiscount     += $item->cartItemProductDiscount();
            $totalFinalPrice   += $item->cartItemFinalPrice();
        }

        return [
            'product_price'  => $totalProductPrice,
            'discount_price' => $totalDiscount,
            'final_price'    => $totalFinalPrice,
        ];
    }

    private function getActiveCommonDiscount()
    {
        return CommonDiscount::where('status', 1)
            ->where('start_date', '<', now())
            ->where('end_date', '>', now())
            ->first();
    }

    private function calculateCommonDiscount($commonDiscount, $orderTotal)
    {
        if (!$commonDiscount || $orderTotal < $commonDiscount->minimal_order_amount) {
            return 0;
        }

        $amount = $orderTotal * ($commonDiscount->percentage / 100);
        return min($amount, $commonDiscount->discount_ceiling);
    }

    private function syncOrderItems(Order $order, $cartItems)
    {
        $cartProductIds = $cartItems->pluck('product_id')->toArray();

        // 1️⃣ حذف آیتم‌هایی که دیگر در سبد خرید نیستند
        OrderItem::where('order_id', $order->id)
            ->whereNotIn('product_id', $cartProductIds)
            ->delete();

        // 2️⃣ بروزرسانی یا ایجاد آیتم‌های فعلی
        foreach ($cartItems as $cartItem) {
            OrderItem::updateOrCreate(
                [
                    'order_id'   => $order->id,
                    'product_id' => $cartItem->product_id,
                ],
                [
                    'product'            => $cartItem->product->toJson(JSON_UNESCAPED_UNICODE),
                    'number'             => $cartItem->number,
                    'final_total_price'  => $cartItem->cartItemProductPrice() * $cartItem->number,
                ]
            );
        }
    }
}
