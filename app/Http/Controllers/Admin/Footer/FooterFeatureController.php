<?php

namespace App\Http\Controllers\Admin\Footer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Footer\FooterFeature;
use Illuminate\Support\Facades\Cache;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Footer\FooterFeatureRequest;

class FooterFeatureController extends Controller
{
    public function index()
    {
        $features = FooterFeature::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.footer.feature.index', compact('features'));
    }

    public function create()
    {

        return view('admin.footer.feature.create');
    }

    public function store(FooterFeatureRequest $request, ImageService $imageService)
    {

        $inputs = $request->all();


        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'footer');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.footer.feature.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $footerFeature = FooterFeature::create($inputs);
        // بروز کردن کش
        Cache::put('footerFeatures', FooterFeature::all());
        return redirect()->route('admin.footer.feature.index')->with('swal-success', 'ویژگی فوتر با موفقیت ثبت شد');
    }


    public function destroy(FooterFeature $footer)
    {

        $result = $footer->delete();
        // بروز کردن کش
        Cache::put('footerFeatures', FooterFeature::all());
        return redirect()->route('admin.footer.feature.index')->with('swal-success', 'ویژگی فوتر با موفقیت حذف شد');
    }
}
