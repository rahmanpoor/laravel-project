<?php

namespace App\Http\Controllers\Admin\Footer;

use Illuminate\Http\Request;
use App\Models\Footer\FooterLink;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Footer\FooterLinkRequest;

class FooterLinkController extends Controller
{
    public function index()
    {
        $links = FooterLink::orderBy('created_at', 'desc')->simplePaginate(15);
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

        return redirect()->route('admin.footer.link.index')->with('swal-success', ' لینک با موفقیت ایجاد شد');
    }

      public function destroy(FooterLink $footer)
    {

        $result = $footer->delete();
        return redirect()->route('admin.footer.link.index')->with('swal-success', ' لینک با موفقیت حذف شد');

    }
}
