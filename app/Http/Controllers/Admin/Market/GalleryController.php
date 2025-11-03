<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Gallery;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.market.product.gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.market.product.gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product, ImageService $imageService)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        // اگر تصویری ارسال نشده، سریع برگرد
        if (!$request->hasFile('image')) {
            return back()->with('swal-error', 'هیچ تصویری ارسال نشده است');
        }

        // مسیر اختصاصی ذخیره تصویر
        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-gallery');

        // ذخیره تصویر و دریافت نتیجه
        $savedImage = $imageService->createIndexAndSave($request->file('image'));

        // اگر آپلود شکست خورد
        if ($savedImage === false) {
            return redirect()
                ->route('admin.market.gallery.index', $product->id)
                ->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }

        // ذخیره در دیتابیس
        Gallery::create([
            'product_id' => $product->id,
            'image' => $savedImage,
        ]);

        return redirect()
            ->route('admin.market.gallery.index', $product->id)
            ->with('swal-success', 'عکس شما با موفقیت ثبت شد');
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
    public function destroy(Product $product, Gallery $gallery)
    {
        $result = $gallery->delete();
        return redirect()->route('admin.market.gallery.index', $product->id)->with('swal-success', 'تصویر گالری شما با موفقیت حذف شد');
    }
}
