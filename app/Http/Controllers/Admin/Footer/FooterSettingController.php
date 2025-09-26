<?php

namespace App\Http\Controllers\Admin\Footer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Footer\FooterSetting;
use App\Http\Requests\Admin\Footer\FooterSettingRequest;

class FooterSettingController extends Controller
{
    public function index(){
        $footerSetting = FooterSetting::first();
        return view('admin.footer.setting.index', compact('footerSetting'));
    }

    public function update(FooterSettingRequest $request){
        $footerSetting = FooterSetting::first();
        $footerSetting->update($request->all());
        return back()->with('swal-success', 'تنظیمات فوتر با موفقیت ویرایش شد');
    }
}
