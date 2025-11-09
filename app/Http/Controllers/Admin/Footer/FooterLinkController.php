<?php

namespace App\Http\Controllers\Admin\Footer;

use Illuminate\Http\Request;
use App\Models\Footer\FooterLink;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Admin\Footer\FooterLinkRequest;

class FooterLinkController extends Controller
{
    public function index()
    {
        $links = FooterLink::orderBy('created_at', 'desc')->paginate(10);
        $positions = FooterLink::$positions;
        return view('admin.footer.link.index', compact('links', 'positions'));
    }


    public function create()
    {
        $positions = FooterLink::$positions;

        return view('admin.footer.link.create', compact('positions'));
    }


    public function store(FooterLinkRequest $request)
    {
        $inputs = $request->all();

        $link = FooterLink::create($inputs);

        // بروز کردن کش
        Cache::put('firstColumnLinks', FooterLink::where('position', 1)->get());
        Cache::put('secondColumnLinks', FooterLink::where('position', 2)->get());
        Cache::put('thirdColumnLinks', FooterLink::where('position', 3)->get());




        return redirect()->route('admin.footer.link.index')->with('swal-success', ' لینک با موفقیت ایجاد شد');
    }

    public function destroy(FooterLink $footer)
    {

        $result = $footer->delete();

        // بروز کردن کش
        Cache::put('firstColumnLinks', FooterLink::where('position', 1)->get());
        Cache::put('secondColumnLinks', FooterLink::where('position', 2)->get());
        Cache::put('thirdColumnLinks', FooterLink::where('position', 3)->get());




        return redirect()->route('admin.footer.link.index')->with('swal-success', ' لینک با موفقیت حذف شد');
    }
}
