<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\CategoryValue;
use App\Models\Market\CategoryAttribute;
use App\Http\Requests\Admin\Market\CategoryValueRequest;

class PropertyValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryAttribute $categoryAttribute)
    {
        $values = CategoryValue::where('category_attribute_id', $categoryAttribute->id)
            ->latest()
            ->paginate(7); // تعداد آیتم در هر صفحه، مثلا 10

        return view('admin.market.property.value.index', [
            'categoryAttribute' => $categoryAttribute,
            'values' => $values
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryAttribute $categoryAttribute)
    {
        return view('admin.market.property.value.create', compact('categoryAttribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValueRequest $request, CategoryAttribute $categoryAttribute)
    {
        $validatedData = $request->validated();

        CategoryValue::create([
            'category_attribute_id' => $categoryAttribute->id,
            'product_id' => $request->product_id ?? null, // اگر اختیاریه، یا مقدار واقعی محصول
            'value' => json_encode([
                'value' => $validatedData['value'],
                'price_increase' => $validatedData['price_increase'],
            ])
        ]);

        return redirect()
            ->route('admin.market.value.index', $categoryAttribute->id)
            ->with('swal-success', 'مقدار فرم کالای جدید با موفقیت ثبت شد.');
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
    public function edit(CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        return view('admin.market.property.value.edit', compact('categoryAttribute', 'value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryValueRequest $request, CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        $validatedData = $request->validated();

        $value->update([
            'category_attribute_id' => $categoryAttribute->id,
            'product_id' => $request->product_id ?? $value->product_id, // مقدار محصول قبلی اگر موجود است
            'value' => json_encode([
                'value' => $validatedData['value'],
                'price_increase' => $validatedData['price_increase'],
            ]),
        ]);

        return redirect()
            ->route('admin.market.value.index', $categoryAttribute->id)
            ->with('swal-success', 'مقدار فرم کالا با موفقیت ویرایش شد.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        $value->delete();

        return redirect()
            ->route('admin.market.value.index', $categoryAttribute->id)
            ->with('swal-success', 'مقدار فرم کالا با موفقیت حذف شد.');
    }
}
