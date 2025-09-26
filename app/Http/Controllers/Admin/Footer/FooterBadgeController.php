<?php

namespace App\Http\Controllers\Admin\Footer;

use Illuminate\Http\Request;
use App\Models\Footer\FooterBadge;
use App\Models\Footer\FooterSocial;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Footer\FooterBadgeRequest;

class FooterBadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $badges = FooterBadge::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.footer.badge.index', compact('badges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $social_icons = FooterSocial::$social_icons;
        return view('admin.footer.badge.create', compact('social_icons'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FooterBadgeRequest $request)
    {

        $inputs = $request->all();

        $badge = FooterBadge::create($inputs);

        return redirect()->route('admin.footer.badge.index')->with('swal-success', ' نماد با موفقیت ایجاد شد');
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
    public function destroy(FooterBadge $footer)
    {
        $result = $footer->delete();
        return redirect()->route('admin.footer.badge.index')->with('swal-success', ' نماد با موفقیت حذف شد');

    }
}
