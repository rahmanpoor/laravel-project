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

class AddressController extends Controller
{
    public function addressAndDelivery() {

        //get login user
        $user = Auth::user();

        $provinces = Province::all();

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

        $inputs['user_id'] = $user->id;

        $order = Order::updateOrCreate(['user_id' => $user->id, 'order_status' => 0],

        $inputs

        );

        return redirect()->route('customer.sales-process.payment');

    }


}
