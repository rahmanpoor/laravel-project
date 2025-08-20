<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery() {

        //get login user
        $user = Auth::user();


        //check cart
        $cartItemsCount  = CartItem::where('user_id', $user->id)->count();
        if (empty($cartItemsCount)) {
            return redirect()->route('customer.sales-process.cart');
        }


        //show address page
        return view('customer.sales-process.address-and-delivery');
    }
}
