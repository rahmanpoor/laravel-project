<?php

namespace App\Http\Controllers\Admin\Footer;

use Illuminate\Http\Request;
use App\Models\Footer\FooterSocial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Admin\Footer\FooterSocialRequest;

class FooterSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $socials = FooterSocial::orderBy('created_at', 'desc')->simplePaginate(15);
        $social_icons = FooterSocial::$social_icons;
        return view('admin.footer.social.index', compact('socials', 'social_icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $social_icons = FooterSocial::$social_icons;
        return view('admin.footer.social.create', compact('social_icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FooterSocialRequest $request)

    {

        $inputs = $request->all();

        $social = FooterSocial::create($inputs);

        // بروز کردن کش
        Cache::put('footerSocials', FooterSocial::all());


        return redirect()->route('admin.footer.social.index')->with('swal-success', ' شبکه اجتماعی با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterSocial $footer)
    {
        $result = $footer->delete();

        // بروز کردن کش
        Cache::put('footerSocials', FooterSocial::all());


        return redirect()->route('admin.footer.social.index')->with('swal-success', ' شبکه اجتماعی با موفقیت حذف شد');
    }
}
