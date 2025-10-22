<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryAttributeRequest;
use App\Models\Market\ProductCategory;
use App\Models\Market\CategoryAttribute;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_attributes = CategoryAttribute::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.market.property.index', compact('category_attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::select('id', 'name')
            ->latest()
            ->get();

        return view('admin.market.property.create', compact('productCategories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryAttributeRequest $request)
    {
        $validatedData = $request->validated();

        CategoryAttribute::create($validatedData);

        return redirect()
            ->route('admin.market.property.index')
            ->with('swal-success', 'ویژگی جدید با موفقیت ثبت شد.');
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
    public function edit(CategoryAttribute $categoryAttribute)
    {
        $productCategories = ProductCategory::select('id', 'name')
            ->latest()
            ->get();

        return view('admin.market.property.edit', compact('categoryAttribute', 'productCategories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryAttributeRequest $request, CategoryAttribute $categoryAttribute)
    {
        $validatedData = $request->validated();

        $categoryAttribute->update($validatedData);

        return redirect()
            ->route('admin.market.property.index')
            ->with('swal-success', 'ویژگی با موفقیت ویرایش شد.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryAttribute $categoryAttribute)
    {
        $categoryAttribute->delete();

        return redirect()
            ->route('admin.market.property.index')
            ->with('swal-success', 'ویژگی با موفقیت حذف شد.');
    }
}
