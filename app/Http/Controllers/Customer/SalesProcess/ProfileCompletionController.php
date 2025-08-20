<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use App\Http\Middleware\ProfileCompletion;
use App\Http\Requests\Customer\SalesProcess\ProfileCompletionRequest;

class ProfileCompletionController extends Controller
{

    public function profileCompletion() {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        return view('customer.sales-process.profile-completion', compact('user', 'cartItems'));
    }

    public function update(ProfileCompletionRequest $request) {

        $user = auth()->user();
        $inputs = $request->all();
        $user->update($inputs);
        return redirect()->route('customer.sales-process.address-and-delivery');
    }
}
