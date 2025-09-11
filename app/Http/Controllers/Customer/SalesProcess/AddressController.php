<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Models\Address;
use App\Models\Province;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use App\Models\Market\CartItem;
use App\Models\Market\Delivery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use App\Http\Requests\Customer\SalesProcess\StoreAddressRequest;
use App\Http\Requests\Customer\SalesProcess\UpdateAddressRequest;
use App\Http\Requests\Customer\SalesProcess\ChooseAddressAndDeliveryRequest;
use App\Models\Market\CommonDiscount;

class AddressController extends Controller
{
    public function addressAndDelivery() {

        //get login user
        $user = Auth::user();

        $provinces = Province::orderBy('name', 'asc')->get();

        $cartItems = CartItem::where('user_id', $user->id)->get();

        $deliveryMethods = Delivery::where('status', 1)->get();

        //check cart
        $cartItemsCount  = CartItem::where('user_id', $user->id)->count();
        if (empty($cartItemsCount)) {
            return redirect()->route('customer.sales-process.cart');
        }


        //show address page
        return view('customer.sales-process.address-and-delivery', compact('cartItems', 'provinces', 'user', 'deliveryMethods'));
    }


    public function getCities(Province $province) {
        $cities = $province->cities;

        if ($cities != null) {
            return response()->json([
                'status' => true,
                'cities' => $cities]);
        }
        else{
            return response()->json([
                'status' => false,
                'cities' => null
            ]);
        }

    }


    public function addAddress(StoreAddressRequest $request) {

        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;

        $inputs['postal_code'] = convertArabicToEnglish($request->postal_code);
        $inputs['postal_code'] = convertPersianToEnglish($inputs['postal_code']);

        //fill reciver info if null
        if( $request->input('recipient_first_name') == null) {
            $inputs['recipient_first_name'] = auth()->user()->first_name;
        }
        if($request->input('recipient_first_name')== null) {
            $inputs['recipient_last_name'] = auth()->user()->last_name;
        }
        if($request->input('mobile') == null) {
            $inputs['mobile'] = '0'. auth()->user()->mobile;
        }

        $address = Address::create($inputs);
        return redirect()->back();
    }


    public function updateAddress(Address $address, UpdateAddressRequest $request) {

        $inputs = $request->all();

        $inputs['user_id'] = auth()->user()->id;

        $inputs['postal_code'] = convertArabicToEnglish($request->postal_code);
        $inputs['postal_code'] = convertPersianToEnglish($inputs['postal_code']);

        if ($request->input('recipient_first_name') == null || $request->input('recipient_last_name') == null) {
            $inputs['recipient_first_name'] = auth()->user()->first_name;
            $inputs['recipient_last_name'] = auth()->user()->last_name;
            $inputs['mobile'] = '0'. auth()->user()->mobile;

        }


        $address->update($inputs);

        return redirect()->back();

    }


    public function chooseAddressAndDelivery(ChooseAddressAndDeliveryRequest $request) {

        $user = Auth::user();

        $inputs = $request->all();


        //calc price
        $cartItems = CartItem::where('user_id', $user->id)->get();

        $totalProductPrice = 0;

        $totalDiscount = 0;

        $totalFinalPrice = 0;

        $totalFinalDiscountPriceWithNumbers = 0;

        foreach ($cartItems as $key => $cartItem) {
            $totalProductPrice += $cartItem->cartItemProductPrice();
            $totalDiscount += $cartItem->cartItemProductDiscount();
            $totalFinalPrice += $cartItem->cartItemFinalPrice();
            $totalFinalDiscountPriceWithNumbers += $cartItem->cartItemFinalDiscount();

        }


        //commonDiscount
        $commonDiscount = CommonDiscount::where([['status', 1], ['end_date', '>', now()], ['start_date', '<', now()]])->first();


        if ($commonDiscount) {
             $inputs['common_discount_id'] = $commonDiscount->id;
            $commonPercentageDiscountAmount = $totalFinalPrice * ($commonDiscount->percentage / 100);

            if ($commonPercentageDiscountAmount > $commonDiscount->discount_ceiling ) {
                $commonPercentageDiscountAmount = $commonDiscount->discount_ceiling;
            }


            if ($commonDiscount != null and $totalFinalPrice >= $commonDiscount->minimal_order_amount) {

                $finalPrice = $totalFinalPrice - $commonPercentageDiscountAmount;

            } else {
                $finalPrice = $totalFinalPrice;
            }

        }
        else {
            $commonPercentageDiscountAmount = 0;
            $finalPrice = $totalFinalPrice;
        }



        $inputs['user_id'] = $user->id;
        $inputs['order_final_amount'] = $finalPrice;
        $inputs['order_discount_amount'] = $totalFinalDiscountPriceWithNumbers;
        $inputs['order_common_discount_amount'] = $commonPercentageDiscountAmount;
        $inputs['order_total_products_discount_amount'] = $inputs['order_discount_amount'] + $inputs['order_common_discount_amount'];

        $order = Order::updateOrCreate(['user_id' => $user->id, 'order_status' => 0],

        $inputs

        );

        return redirect()->route('customer.sales-process.payment');

    }


}
