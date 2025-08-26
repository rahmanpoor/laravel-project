<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Models\Address;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use App\Http\Requests\Customer\SalesProcess\StoreAddressRequest;

class AddressController extends Controller
{
    public function addressAndDelivery() {

        //get login user
        $user = Auth::user();

        $provinces = Province::all();

        $cartItems = CartItem::where('user_id', $user->id)->get();

        //check cart
        $cartItemsCount  = CartItem::where('user_id', $user->id)->count();
        if (empty($cartItemsCount)) {
            return redirect()->route('customer.sales-process.cart');
        }


        //show address page
        return view('customer.sales-process.address-and-delivery', compact('cartItems', 'provinces'));
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
        $address = Address::create($inputs);
        return redirect()->back();
    }


}
