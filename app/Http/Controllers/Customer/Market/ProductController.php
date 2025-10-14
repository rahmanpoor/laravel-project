<?php

namespace App\Http\Controllers\Customer\Market;

use Illuminate\Http\Request;
use App\Models\Market\Compare;
use App\Models\Market\Product;
use App\Models\Content\Comment;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\PHP;

class ProductController extends Controller
{
    public function product(Product $product)
    {

        $cartItem = null;
        if (Auth::check()) {
            $cartItem = CartItem::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
        }


        $relatedProducts = Product::all();
        return view('customer.market.product.product', compact('product', 'relatedProducts', 'cartItem'));
    }

    public function addComment(Product $product, Request $request)
    {
        $request->validate([
            'body' => 'required|max:2000'
        ]);

        $inputs['body'] = str_replace(PHP_EOL, "<br/>", $request->body);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['commentable_id'] = $product->id;
        $inputs['commentable_type'] = Product::class;
        Comment::create($inputs);
        return back()->with('swal-success', 'پس از تایید نظر شما نمایش داده خواهد شد');
    }


    public function addToFavorite(Product $product)
    {
        if (Auth::check()) {
            $product->user()->toggle([Auth::user()->id]);

            if ($product->user->contains(Auth::user()->id)) {

                return response()->json(['status' => 1]);
            } else {

                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }

      public function addToCompare(Product $product)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if($user->compare()->count() > 0){
                $userCompareList = $user->compare;
            } else {
                $userCompareList = Compare::create(['user_id' => $user->id]);
            }

            $product->compares()->toggle([$userCompareList->id]);
            if ($product->user->contains([$userCompareList->id])) {

                return response()->json(['status' => 1]);
            } else {

                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }

    public function addRate(Product $product, Request $request)
    {
        $productIds = auth()->user()->isUserPurchedProduct($product->id);

        if (Auth::check() && $productIds->count() > 0) {
            $user = Auth::user();
            $user->rate($product, $request->rating);
            return back()->with('swal-success', 'امتیاز شما با موفقیت ثبت شد');
        } else {
            return back()->with('swal-error', 'شما این محصول را خرید نکرده اید');
        }
    }
}
