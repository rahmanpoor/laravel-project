<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {


        $cartItems = CartItem::where('user_id', auth()->user()->id)->get();
        if ($cartItems->count() > 0) {
            $relatedProducts = Product::all();
            return view('customer.sales-process.cart', compact('cartItems', 'relatedProducts'));
        } else {
            return redirect()->route('customer.home');
        }
    }

    public function updateCart(Request $request)
    {

        $inputs = $request->all();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        foreach ($cartItems as $key => $cartItem) {
            if (isset($inputs['number'][$cartItem->id])) {
                $cartItem->update(['number' => $inputs['number'][$cartItem->id]]);
            }
        }
        return redirect()->route('customer.sales-process.address-and-delivery');
    }

    public function addToCart(Product $product, Request $request)
    {
        $request->validate([
            'color'     => 'nullable|exists:product_colors,id',
            'guarantee' => 'nullable|exists:guarantees,id',
            'number'    => 'numeric|min:1|max:5',
        ]);

        $color     = $request->color ?? null;
        $guarantee = $request->guarantee ?? null;
        $userId    = auth()->id();

        $cartItem = CartItem::where('product_id', $product->id)
            ->where('user_id', $userId)
            ->where('color_id', $color)
            ->where('guarantee_id', $guarantee)
            ->first();

        if ($cartItem) {
            if ($cartItem->number != $request->number) {
                $cartItem->update(['number' => $request->number]);
                return back()->with('alert-section-success', 'تعداد این محصول در سبد خرید تغییر کرد');
            }
            return back()->with('alert-section-info', 'این محصول قبلا به سبد خرید اضافه شده است');
        }

        CartItem::create([
            'product_id'   => $product->id,
            'user_id'      => $userId,
            'color_id'     => $color,
            'guarantee_id' => $guarantee,
            'number'       => $request->number,
        ]);

        return back()->with('alert-section-success', 'محصول به سبد خرید اضافه شد');
    }


    public function removeFromCart(CartItem $cartItem)
    {

        if ($cartItem->user_id == auth()->user()->id) {
            $cartItem->delete();
        }

        return back()->with('alert-section-success', 'محصول از سبد خرید حذف شد');
    }
}
