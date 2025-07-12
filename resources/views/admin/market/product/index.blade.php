@extends('admin.layouts.master')



@section('head-tag')
    <title>کالاها</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> کالاها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کالاها
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.product.create') }}" class="btn btn-info btn-sm">ایجاد کالا جدید</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>قیمت</th>
                                <th>دسته</th>
                                <th class="max-width-8-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td> <img
                                            src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}"
                                            alt="" width="100" height="75"></td>
                                    <td>{{ $product->price }} تومان</td>
                                    <td>کالای الکترونیکی</td>
                                    <td class="width-16-rem text-left">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                                role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a href="{{ route('admin.market.gallery.index', $product->id) }}"
                                                    class="dropdown-item text-right"><i class="fa fa-images"></i> گالری</a>
                                                <a href="{{ route('admin.market.color.index', $product->id) }}"
                                                    class="dropdown-item text-right"><i class="fa fa-list-ul"></i>
                                                    رنگ کالا</a>
                                                <a href="{{ route('admin.market.product.edit', $product->id) }}"
                                                    class="dropdown-item text-right"><i class="fa fa-edit"></i>
                                                    ویرایش</a>
                                                <form action="{{ route('admin.market.product.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-right delete"><i
                                                            class="fa fa-window-close"></i> حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection


@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
