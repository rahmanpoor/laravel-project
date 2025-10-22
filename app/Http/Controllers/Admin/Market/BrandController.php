<?php

namespace App\Http\Controllers\Admin\Market;


use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\BrandRequest;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.market.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request, ImageService $imageService)
    {
        $inputs = $request->validated();

        // اگر لوگو ارسال شده باشد، عملیات آپلود را انجام بده
        if ($request->hasFile('logo')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');

            $result = $imageService->createIndexAndSave($request->file('logo'));

            // اگر آپلود تصویر با خطا مواجه شد
            if ($result === false) {
                return redirect()
                    ->route('admin.market.brand.index')
                    ->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['logo'] = $result;
        }

        Brand::create($inputs);

        return redirect()
            ->route('admin.market.brand.index')
            ->with('swal-success', 'برند جدید با موفقیت ثبت شد');
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
    public function edit(Brand $brand)
    {
        return view('admin.market.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand, ImageService $imageService)
    {
        $inputs = $request->validated();

        // اگر فایل لوگو جدید ارسال شده باشد
        if ($request->hasFile('logo')) {
            // حذف تصویر قبلی (در صورت وجود)
            if (!empty($brand->logo['directory'])) {
                $imageService->deleteDirectoryAndFiles($brand->logo['directory']);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $result = $imageService->createIndexAndSave($request->file('logo'));

            if ($result === false) {
                return redirect()
                    ->route('admin.market.brand.index')
                    ->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['logo'] = $result;
        }

        // اگر لوگو جدیدی ارسال نشده ولی currentImage وجود دارد
        elseif (isset($inputs['currentImage']) && !empty($brand->logo)) {
            $brand->logo['currentImage'] = $inputs['currentImage'];
            $inputs['logo'] = $brand->logo;
        }

        $brand->update($inputs);

        return redirect()
            ->route('admin.market.brand.index')
            ->with('swal-success', 'برند شما با موفقیت ویرایش شد');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $result = $brand->delete();
        return redirect()->route('admin.market.brand.index')->with('swal-success', 'برند شما با موفقیت حذف شد');
    }
}
