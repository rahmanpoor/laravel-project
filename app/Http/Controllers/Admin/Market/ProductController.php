<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\ProductMeta;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.market.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::select('id', 'name')->orderBy('name')->get();
        $brands = Brand::select('id', 'original_name')->orderBy('original_name')->get();

        return view('admin.market.product.create', compact('productCategories', 'brands'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ImageService $imageService)
    {
        $inputs = $request->validated();

        // اصلاح تاریخ انتشار
        // $timestamp = (int) substr($inputs['published_at'], 0, 10);
        // $inputs['published_at'] = date('Y-m-d H:i:s', $timestamp);

        // آپلود تصویر محصول
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {
                return redirect()
                    ->route('admin.market.product.index')
                    ->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['image'] = $result;
        }

        try {
            DB::transaction(function () use ($inputs, $request) {
                $product = Product::create($inputs);

                // ذخیره متاها (meta_key و meta_value)
                if (!empty($request->meta_key) && !empty($request->meta_value)) {
                    $metas = array_combine($request->meta_key, $request->meta_value);

                    foreach ($metas as $key => $value) {
                        ProductMeta::create([
                            'meta_key'   => $key,
                            'meta_value' => $value,
                            'product_id' => $product->id,
                        ]);
                    }
                }
            });

            return redirect()
                ->route('admin.market.product.index')
                ->with('swal-success', 'محصول جدید با موفقیت ثبت شد');
        } catch (\Exception $e) {
            // در صورت بروز خطا در تراکنش یا آپلود
            return redirect()
                ->route('admin.market.product.index')
                ->with('swal-error', 'خطا در ثبت محصول، لطفاً مجدداً تلاش کنید');
        }
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
    public function edit(Product $product)
    {
        $productCategories = ProductCategory::select('id', 'name')->active()->get();

        $brands = Brand::select('id', 'persian_name', 'logo')->get();

        return view('admin.market.product.edit', [
            'product' => $product,
            'productCategories' => $productCategories,
            'brands' => $brands,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->all();
        // //date fixed
        // $realTimestampStart = substr($request->published_at, 0, 10);
        // $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile('image')) {
            if (!empty($product->image)) {
                $imageService->deleteDirectoryAndFiles($product->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($product->image)) {
                $image = $product->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $product->update($inputs);
        if ($request->has('meta_key')) {
            $meta_keys = $request->meta_key;
            $meta_values = $request->meta_value;
            $meta_ids = array_keys($request->meta_key);
            $metas = array_map(function ($meta_id, $meta_key, $meta_value) {
                return array_combine(
                    ['meta_id', 'meta_key', 'meta_value'],
                    [$meta_id, $meta_key, $meta_value]
                );
            }, $meta_ids, $meta_keys, $meta_values);
            foreach ($metas as $meta) {
                ProductMeta::where('id', $meta['meta_id'])->update([
                    'meta_key' => $meta['meta_key'],
                    'meta_value' => $meta['meta_value']
                ]);
            }
        }
        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول  شما با موفقیت ویرایش شد');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();

            // حذف تصویر محصول در صورت وجود
            if (!empty($product->image) && isset($product->image['directory'])) {
                app(\App\Http\Services\Image\ImageService::class)
                    ->deleteDirectoryAndFiles($product->image['directory']);
            }

            // حذف متادیتاهای مرتبط با محصول (در صورت وجود رابطه)
            $product->metas()->delete();

            // حذف خود محصول
            $product->delete();

            DB::commit();

            return redirect()
                ->route('admin.market.product.index')
                ->with('swal-success', 'محصول شما با موفقیت حذف شد');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()
                ->route('admin.market.product.index')
                ->with('swal-error', 'حذف محصول با خطا مواجه شد');
        }
    }
}
