<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Models\Market\Copan;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use App\Models\Market\Payment;
use App\Models\Market\CartItem;
use App\Models\Market\OrderItem;
use App\Models\Market\CashPayment;
use App\Http\Controllers\Controller;
use App\Models\Market\OnlinePayment;
use Illuminate\Support\Facades\Auth;
use App\Models\Market\OfflinePayment;
use App\Http\Services\Payment\ZarinpalService;
use Illuminate\Support\Facades\DB;





class PaymentController extends Controller
{
    public function payment()
    {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();

     

        
        $order->order_final_amount = $order->order_amount + $order->delivery_amount;

        $order->save();
        return view('customer.sales-process.payment', compact('cartItems', 'order'));
    }

    public function copanDiscount(Request $request)
    {
        $request->validate(
            ['code' => 'required']
        );


        $copan = Copan::where([['code', $request->code], ['status', 1], ['end_date', '>', now()], ['start_date', '<', now()]])->first();




        if ($copan != null) {

            if ($copan->user_id != null) {

                $copan = Copan::where([['code', $request->code], ['status', 1], ['end_date', '>', now()], ['start_date', '<', now()], ['user_id', auth()->user()->id]])->first();
                if ($copan == null) {
                    return redirect()->back()->withErrors(['code' => 'کد تخفیف شما معتبر نیست']);
                }
            }

            $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->where('copan_id', null)->first();




            if ($order) {
                if ($copan->amount_type == 0) {
                    $copanDiscountAmount = $order->order_final_amount * ($copan->amount / 100);
                    if ($copanDiscountAmount > $copan->discount_ceiling) {
                        $copanDiscountAmount = $copan->discount_ceiling;
                    }
                } else {
                    $copanDiscountAmount = $copan->amount;
                }

                $order->order_final_amount = $order->order_final_amount - $copanDiscountAmount;

                $finalDiscount = $order->order_total_products_discount_amount + $copanDiscountAmount;

                $order->update(
                    ['copan_id' => $copan->id, 'order_copan_discount_amount' => $copanDiscountAmount, 'order_total_products_discount_amount' => $finalDiscount]
                );

                return redirect()->back()->with('swal-success', 'کد تخفیف شما با موفقیت اعمال شد');
            } else {
                return redirect()->back()->withErrors(['code' => 'کد تخفیف شما معتبر نیست']);
            }
        } else {
            return redirect()->back()->withErrors(['code' => 'کد تخفیف شما معتبر نیست']);
        }
    }

    public function paymentSubmit(Request $request, ZarinpalService $zarinpalService)
    {
        $request->validate(

            ['payment_type' => 'required|in:1,2,3']
        );

        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        $cash_receiver = null;
        switch ($request->payment_type) {
            case '1':
                $targetModel = OnlinePayment::class;
                $type = 0;
                break;
            case '2':
                $targetModel = OfflinePayment::class;
                $type = 1;
                break;
            case '3':
                $targetModel = CashPayment::class;
                $type = 2;
                $cash_receiver = $request->cash_receiver ? $request->cash_receiver : null;
                break;

            default:
                return redirect()->back()->withErrors(['error' => 'خطا']);
                break;
        }

        $paymented = $targetModel::create([

            'amount' => $order->order_final_amount,
            'user_id' => Auth::user()->id,
            'pay_date' => now(),
            'cash_receiver' => $cash_receiver,
            'status' => 1
        ]);

        $callbackUrl = route('customer.sales-process.payment-callback', [
            'order' => $order->id,
            'onlinePayment' => $paymented->id,
        ]);


        $payment = Payment::create([
            'amount' => $order->order_final_amount,
            'user_id' => Auth::user()->id,
            'pay_date' => now(),
            'type' => $type,
            'paymentable_id' => $paymented->id,
            'paymentable_type' => $targetModel,
            'status' => 1
        ]);


        //zarinpal start
        if ($request->payment_type == 1) {
            // return redirect()->route('customer.sales-process.pay', $order);
            //convert price to tooman IR
            $tooman = $paymented->amount * 10;
            $response = $zarinpalService->requestPayment(
                $tooman,
                'پرداخت سفارش #' . $order->id,
                ['mobile' => Auth::user()->mobile, 'email' => Auth::user()->email],
                $callbackUrl
            );

            if (isset($response['data']['authority']) && $response['data']['code'] == 100) {



                $paymented->update([
                    'bank_first_response' => json_encode($response, JSON_UNESCAPED_UNICODE)
                ]);
                // ریدایرکت به صفحه پرداخت
                return redirect("https://www.zarinpal.com/pg/StartPay/" . $response['data']['authority']);
            }

            return $response;
        } else {
            $order->update(
                ['order_status' => 1]
            );

            foreach ($cartItems as $cartItem) {
                $product     = $cartItem->product;
                $amazingSale = $product->activeAmazingSales();

                $discountAmount    = $amazingSale ? $cartItem->cartItemProductPrice() * ($amazingSale->percentage / 100) : 0;
                $finalProductPrice = $product->price - $discountAmount;
                $finalTotalPrice   = $finalProductPrice * $cartItem->number;

                OrderItem::create([
                    'order_id'                     => $order->id,
                    'product_id'                   => $product->id,
                    'product'                      => $product,
                    'amazing_sale_id'              => $amazingSale->id ?? null,
                    'amazing_sale_object'          => $amazingSale,
                    'amazing_sale_discount_amount' => $discountAmount,
                    'number'                       => $cartItem->number,
                    'final_product_price'          => $finalProductPrice,
                    'final_total_price'            => $finalTotalPrice,
                    'color_id'                     => $cartItem->color_id,
                    'guarantee_id'                 => $cartItem->guarantee_id,
                ]);

                $cartItem->delete();
            }

            CartItem::where('user_id', Auth::id())->delete();
            return redirect()->route('customer.home')->with('swal-success', 'سفارش شما با موفقیت ثبت شد');
        }
    }



    public function paymentCallback(Request $request, ZarinpalService $zarinpalService, Order $order, OnlinePayment $onlinePayment)
    {

        $authority = $request->get('Authority');
        $status = $request->get('Status');





        if ($status === 'OK') {

            return DB::transaction(function () use ($zarinpalService, $order, $onlinePayment, $authority) {

                $result = $zarinpalService->verifyPayment($order->order_final_amount * 10, $authority);


                $onlinePayment->update(['bank_second_response' => json_encode($result, JSON_UNESCAPED_UNICODE)]);



                if (isset($result['data']['code']) && $result['data']['code'] == 100) {
                    $refId = $result['data']['ref_id']; // کد رهگیری
                    $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
                    foreach ($cartItems as $cartItem) {
                        $product     = $cartItem->product;
                        $amazingSale = $product->activeAmazingSales();

                        $discountAmount    = $amazingSale ? $cartItem->cartItemProductPrice() * ($amazingSale->percentage / 100) : 0;
                        $finalProductPrice = $product->price - $discountAmount;
                        $finalTotalPrice   = $finalProductPrice * $cartItem->number;

                        OrderItem::create([
                            'order_id'                     => $order->id,
                            'product_id'                   => $product->id,
                            'product'                      => $product,
                            'amazing_sale_id'              => $amazingSale->id ?? null,
                            'amazing_sale_object'          => $amazingSale,
                            'amazing_sale_discount_amount' => $discountAmount,
                            'number'                       => $cartItem->number,
                            'final_product_price'          => $finalProductPrice,
                            'final_total_price'            => $finalTotalPrice,
                            'color_id'                     => $cartItem->color_id,
                            'guarantee_id'                 => $cartItem->guarantee_id,
                        ]);

                        $cartItem->delete();
                    }


                    $order->update(
                        ['order_status' => 1, 'payment_status' => 1]
                    );
                    return redirect()->route('customer.home')->with('swal-success', "پرداخت موفق ✅ - کد رهگیری: $refId");
                    // return "پرداخت موفق: " . $result['data']['ref_id'];
                }
            });


            return redirect()->route('customer.home')->with('swal-error', 'خطا در وریفای تراکنش.');
        }

        // ایجاد OrderItemها حتی در صورت پرداخت ناموفق
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id'    => $order->id,
                'product_id'  => $cartItem->product_id,
                'product'     => $cartItem->product->toArray(),
                'number'      => $cartItem->number,
                'final_total_price' => $cartItem->cartItemProductPrice() * $cartItem->number,
            ]);
        }
        // 3=> cancel |  0 => unpaid
        $order->update(['order_status' => 3, 'payment_status' => 2]); // پرداخت ناموفق
        return redirect()->route('customer.home')->with('swal-error', 'پرداخت انجام نشد. می‌توانید دوباره تلاش کنید.');
    }

    // public function callback(Request $request, ZarinpalService $zarinpalService, Order $order, OnlinePayment $onlinePayment)
    // {
    //     $authority = $request->get('Authority');
    //     $status = $request->get('Status');





    //     if ($status === 'OK') {



    //         $result = $zarinpalService->verifyPayment($order->order_final_amount * 10, $authority);

    //         $onlinePayment->update(['bank_second_response' => json_encode($result, JSON_UNESCAPED_UNICODE)]);



    //         if (isset($result['data']['code']) && $result['data']['code'] == 100) {
    //             $order->update(
    //                 ['order_status' => 3]
    //             );
    //             CartItem::where('user_id', Auth::id())->delete();
    //             return redirect()->route('customer.home')->with('swal-success', 'سفارش شما با موفقیت ثبت شد');
    //             // return "پرداخت موفق: " . $result['data']['ref_id'];
    //         }

    //         return back()->with('swal-error', 'خطا در وریفای تراکنش.');
    //     }
    //     $onlinePayment->update(['status' => 0]); // پرداخت ناموفق
    //     return back()->with('swal-error', 'پرداخت ناموفق یا لغو شد.');
    // }
};
