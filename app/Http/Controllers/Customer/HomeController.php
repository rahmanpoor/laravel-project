<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $slideShowImages = Banner::where('position', 0)->where('status', 1)->get();
        $topBanners = Banner::where('position', 1)->where('status', 1)->take(2)->get();
        $middleBanners = Banner::where('position', 2)->where('status', 1)->take(2)->get();
        $bottomBanners = Banner::where('position', 3)->where('status', 1)->first();
        return view('customer.home');
    }
}
