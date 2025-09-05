<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Models\Market\Copan;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use App\Models\Market\Payment;
use App\Models\Market\CartItem;
use App\Models\Market\CashPayment;
use App\Http\Controllers\Controller;
use App\Models\Market\OnlinePayment;
use Illuminate\Support\Facades\Auth;
use App\Models\Market\OfflinePayment;

class PaymentController extends Controller
{
    public function payment()
    {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();
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

    public function paymentSubmit(Request $request)
    {
        $request->validate(
            ['payment_type' => 'required']
        );

        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
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
                break;

            default:
                return redirect()->back()->withErrors(['error' => 'خطا']);
                break;
        }

        $paymented = $targetModel::create([
            'amount' => $order->order_final_amount,
            'user_id' => Auth::user()->id,
            'pay_date' => now(),
            'status' => 1
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

        $order->update([
            'order_status' => 3
        ]);


        foreach ($cartItems as $key => $cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('customer.home')->with('swal-success', 'سفارش شما با موفقیت ثبت شد');
    }
}
