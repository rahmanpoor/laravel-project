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
        $userId = auth()->id();

        // بررسی وجود آیتم در سبد خرید
        $hasItems = CartItem::where('user_id', $userId)->exists();

        if (!$hasItems) {
            return redirect()->route('customer.home');
        }

        // دریافت آیتم‌های سبد خرید با اطلاعات محصول
        $cartItems = CartItem::with('product')->where('user_id', $userId)->get();

        // پیشنهاد محصول مرتبط (مثال: 10 محصول آخر)
        $relatedProducts = Product::latest()->take(10)->get();

        return view('customer.sales-process.cart', compact('cartItems', 'relatedProducts'));
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
            'number' => 'numeric|min:1|max: 5',
        ]);


        if ($request->number > $product->marketable_number) {
            return back()->with('swal-error', 'تعداد درخواستی بیشتر از موجودی است');
        }

        $color = $request->input('color');
        $guarantee = $request->input('guarantee');
        $userId = auth()->id();

        $cartItem = CartItem::firstOrNew([
            'product_id'   => $product->id,
            'user_id'      => $userId,
            'color_id'     => $color,
            'guarantee_id' => $guarantee,
        ]);

        if ($cartItem->exists) {
            if ($cartItem->number != $request->number) {
                $cartItem->number = $request->number;
                $cartItem->save();
                return back()->with('alert-section-success', 'تعداد این محصول در سبد خرید تغییر کرد');
            }
            return back()->with('alert-section-info', 'این محصول قبلا به سبد خرید اضافه شده است');
        }


        $cartItem->number = $request->number;
        $cartItem->save();

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
