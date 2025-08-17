<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart() {

    }

    public function updateCart() {

    }

    public function addToCart(Product $product, Request $request) {

        if (Auth::check()) {

            $request->validate([
                'color' => 'nullable|exists:product_colors,id',
                'guarantee' => 'nullable|exists:guarantees,id',
                'number' => 'numeric|min:1|max:5'
            ]);

            $cartItems = CartItem::where('product_id', $product->id)->where('user_id', auth()->user()->id)->get();

            if(!isset($request->color))
            {
                $request->color = null;
            }
            if(!isset($request->guarantee))
            {
                $request->guarantee = null;
            }

            foreach($cartItems as $cartItem)
            {
                if($cartItem->color_id == $request->color && $cartItem->guarantee_id == $request->guarantee)
                {
                    if($cartItem->number != $request->number)
                    {
                        $cartItem->update(['number' => $request->number]);
                        return back()->with('alert-section-success', 'تعداد این محصول در سبد خرید تغییر کرد');
                    }
                    return back()->with('alert-section-info', 'این محصول قبلا به سبد خرید اضافه شده است');
                }
            }

            $inputs = [];
            $inputs['product_id'] = $product->id;
            $inputs['user_id'] = auth()->user()->id;
            $inputs['color_id'] = $request->color;
            $inputs['guarantee_id'] = $request->guarantee;


            CartItem::create($inputs);

            return back()->with('alert-section-success', 'محصول به سبد خرید اضافه شد');

        }
        else {
            return redirect()->route('auth.customer.login-register-form');
        }

    }

    public function removeFromCart() {

    }
}
