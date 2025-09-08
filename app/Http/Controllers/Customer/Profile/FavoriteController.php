<?php

namespace App\Http\Controllers\Customer\Profile;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function index() {

        return view('customer.profile.my-favorites');
    }

    public function delete(Product $product) {
        $user = auth()->user();
        $user->products()->detach($product->id);
        return redirect()->route('customer.profile.my-favorites')->with('alert-section-success', 'محصول با موفقیت از علاقه مندی ها حذف شد');
    }
}
