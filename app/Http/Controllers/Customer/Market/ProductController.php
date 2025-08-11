<?php

namespace App\Http\Controllers\Customer\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Content\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\PHP;

class ProductController extends Controller
{
    public function product(Product $product){

        $relatedProducts = Product::all();
        return view('customer.market.product.product', compact('product', 'relatedProducts'));

    }

    public function addComment(Product $product, Request $request){
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
}
