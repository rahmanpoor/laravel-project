<?php

namespace App\Http\Controllers\Customer;

use App\Models\Content\Page;
use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Models\Market\Product;
use App\Models\Setting\Setting;
use App\Http\Controllers\Controller;
use App\Models\Footer\FooterFeature;
use App\Models\Market\ProductCategory;
use Intervention\Image\Colors\Rgb\Channels\Red;

class HomeController extends Controller
{
    public function home()
    {
        //banner
        $slideShowImages = Banner::where('position', 0)->where('status', 1)->get();
        $topBanners = Banner::where('position', 1)->where('status', 1)->take(2)->get();
        $middleBanners = Banner::where('position', 2)->where('status', 1)->take(2)->get();
        $bottomBanner = Banner::where('position', 3)->where('status', 1)->first();





        $brands = Brand::whereNotNull('logo')->get();
        $mostVisitedProducts = Product::latest()->take(10)->get();
        $offerProducts = Product::latest()->take(10)->get();



        return view('customer.home', compact('slideShowImages', 'topBanners', 'middleBanners', 'bottomBanner', 'brands', 'mostVisitedProducts', 'offerProducts'));
    }


    public function products(Request $request, ProductCategory $category = null)
    {


        //brands
        $brands = Brand::all();

        //category selection
        if ($category)
            $productModel = $category->products();
        else
            $productModel = new Product();

        //get parent categories
        $categories = ProductCategory::whereNull('parent_id')->get();

        //set sort
        switch ($request->sort) {
            case '1':
                $column = 'created_at';
                $direction = 'DESC';
                break;
            case '2':
                $column = 'price';
                $direction = 'DESC';
                break;
            case '3':
                $column = 'price';
                $direction = 'ASC';
                break;
            case '4':
                $column = 'view';
                $direction = 'DESC';
                break;
            case '5':
                $column = 'sold_number';
                $direction = 'DESC';
                break;
            default:
                $column = 'created_at';
                $direction = 'ASC';
                break;
        }
        if ($request->search) {
            $query = $productModel->where('name', 'like', '%' . $request->search . '%')->orderBy($column, $direction);
        } else {
            $query = $productModel->orderBy($column, $direction);
        }

        $request->min_price = str_replace('٬', '', request()->min_price);

        $request->max_price = str_replace('٬', '', request()->max_price);





        $products = $request->min_price && $request->max_price ? $query->whereBetween('price', [$request->min_price, $request->max_price]) :
            $query->when($request->min_price, function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price);
            })->when($request->max_price, function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            })->when(!($request->min_price && $request->max_price), function ($query) {
                $query;
            });

        $products = $products->when($request->brands, function () use ($request, $products) {
            $products->whereIn('brand_id', $request->brands);
        });

        $products = $products->paginate(5);
        $products->appends($request->query());



        //get brand names
        $brandNames = [];
        if (request()->filled('brands')) {
            $brandIds = (array) request()->brands;
            $brandNames = Brand::whereIn('id', $brandIds)->pluck('persian_name')->toArray();
        }




        return view('customer.market.product.products', compact('products', 'brands', 'brandNames', 'categories'));
    }

    public function page(Page $page) {
        return view('customer.page', compact('page'));
    }
}
