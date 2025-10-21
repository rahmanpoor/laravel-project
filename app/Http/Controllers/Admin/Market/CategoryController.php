<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.market.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::whereNull('parent_id')->get();
        return view('admin.market.category.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request, ImageService $imageService)
    {
        $inputs = $request->validated();
        $result = null;

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {
                return redirect()->route('admin.market.category.index')
                    ->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['image'] = $result;
        }

        ProductCategory::create($inputs);

        return redirect()->route('admin.market.category.index')
            ->with('swal-success', 'دسته‌بندی با موفقیت ثبت شد');
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
    public function edit(ProductCategory $productCategory)
    {
        $parent_categories = ProductCategory::whereNull('parent_id')->where('id', '!=', $productCategory->id)->get();
        return view('admin.market.category.edit', compact('productCategory', 'parent_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory, ImageService $imageService)
    {
        $inputs = $request->validated();
        $result = null;

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {
                return redirect()->route('admin.market.category.index')
                    ->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }

            // حذف تصویر قبلی فقط در صورت موفقیت آپلود جدید
            if (!empty($productCategory->image)) {
                $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
            }

            $inputs['image'] = $result;
        } else {
            // اگر کاربر تصویری انتخاب نکرده اما currentImage وجود دارد
            if (isset($inputs['currentImage']) && !empty($productCategory->image)) {
                $image = $productCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            } else {
                // هیچ تغییر در تصویر رخ نداده
                $inputs['image'] = $productCategory->image;
            }
        }

        $productCategory->update($inputs);

        return redirect()->route('admin.market.category.index')
            ->with('swal-success', 'دسته‌بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory, ImageService $imageService)
    {
        // بررسی وجود زیر دسته
        if ($productCategory->children()->exists()) {
            return back()->with('swal-error', 'دسته بندی دارای زیر دسته می‌باشد و قابل حذف نیست.');
        }

        // بررسی وجود محصول مرتبط (اختیاری)
        if (method_exists($productCategory, 'products') && $productCategory->products()->exists()) {
            return back()->with('swal-error', 'این دسته دارای محصولات فعال است و قابل حذف نیست.');
        }

        // حذف تصویر در صورت وجود
        if (!empty($productCategory->image)) {
            $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
        }

        // حذف دسته
        $productCategory->delete();

        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی با موفقیت حذف شد');
    }

  public function status(ProductCategory $productCategory)
{
    // تغییر وضعیت به صورت بولین
    $productCategory->status = !$productCategory->status;

    // ذخیره نتیجه
    $saved = $productCategory->save();

    // پاسخ JSON به صورت مختصر و خوانا
    return response()->json([
        'status' => $saved,
        'checked' => (bool) $productCategory->status,
    ]);
}

}
