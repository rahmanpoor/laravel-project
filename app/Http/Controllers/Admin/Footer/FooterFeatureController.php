<?php

namespace App\Http\Controllers\Admin\Footer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Footer\FooterFeature;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Footer\FooterFeatureRequest;

class FooterFeatureController extends Controller
{
    public function index()
    {
        $features = FooterFeature::orderBy('created_at', 'desc')->simplePaginate(15);
        $positions = FooterFeature::$positions;
        return view('admin.footer.feature.index', compact('features','positions'));
    }

    public function create()
    {
         $positions = FooterFeature::$positions;
        return view('admin.footer.feature.create', compact('positions'));
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
        return redirect()->route('admin.footer.feature.index')->with('swal-success', 'ویژگی فوتر با موفقیت ثبت شد');
    }


        public function destroy(FooterFeature $footer)
    {

        $result = $footer->delete();
        return redirect()->route('admin.footer.feature.index')->with('swal-success', 'ویژگی فوتر با موفقیت حذف شد');

    }
}
