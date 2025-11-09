<?php

namespace App\Http\Controllers\Admin\Footer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Footer\FooterSetting;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Admin\Footer\FooterSettingRequest;

class FooterSettingController extends Controller
{
    public function index()
    {
        $footerSetting = FooterSetting::first();
        return view('admin.footer.setting.index', compact('footerSetting'));
    }

    public function update(FooterSettingRequest $request)
    {
        // ذخیره یا آپدیت
        FooterSetting::updateOrCreate(['id' => 1], $request->all());

        // بروز کردن کش
        Cache::put('footerSetting', FooterSetting::first());

        return back()->with('swal-success', 'تنظیمات فوتر با موفقیت به‌روز شد');
        return back()->with('swal-success', 'تنظیمات فوتر با موفقیت ویرایش شد');
    }
}
