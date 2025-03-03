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
                                <th>وزن</th>
                                <th>دسته</th>
                                <th>فرم</th>
                                <th class="max-width-8-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>LED سامسونگ</td>
                                <td><img src="{{ asset('admin-asset/images/led.jpg') }}" class="max-height-3-rem"
                                        alt="LED"></td>
                                <td>12,500,000 تومان</td>
                                <td>13 کیلوگرم</td>
                                <td>کالای الکترونیکی</td>
                                <td>نمایشگر</td>
                                <td class="width-16-rem text-left">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                            role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="#" class="dropdown-item text-right"><i class="fa fa-images"></i>
                                                گالری</a>
                                            <a href="#" class="dropdown-item text-right"><i class="fa fa-list-ul"></i>
                                                فرم کالا</a>
                                            <a href="#" class="dropdown-item text-right"><i class="fa fa-edit"></i>
                                                ویرایش</a>
                                                <form action="" method="POST">
                                                    <button type="submit" class="dropdown-item text-right"><i
                                                        class="fa fa-window-close"></i> حذف</button>
                                                </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>آیفون 16</td>
                                <td><img src="{{ asset('admin-asset/images/iphone 16.jpg') }}" class="max-height-3-rem"
                                        alt="LED"></td>
                                <td>18,500,000 تومان</td>
                                <td>1 کیلوگرم</td>
                                <td>کالای الکترونیکی</td>
                                <td>موبایل</td>
                                <td class="width-16-rem text-left">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                            role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="#" class="dropdown-item text-right"><i class="fa fa-images"></i>
                                                گالری</a>
                                            <a href="#" class="dropdown-item text-right"><i class="fa fa-list-ul"></i>
                                                فرم کالا</a>
                                            <a href="#" class="dropdown-item text-right"><i class="fa fa-edit"></i>
                                                ویرایش</a>
                                                <form action="" method="POST">
                                                    <button type="submit" class="dropdown-item text-right"><i
                                                        class="fa fa-window-close"></i> حذف</button>
                                                </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>بلندگو</td>
                                <td><img src="{{ asset('admin-asset/images/speaker.jpg') }}" class="max-height-3-rem"
                                        alt="LED"></td>
                                <td>1,500,000 تومان</td>
                                <td>2 کیلوگرم</td>
                                <td>کالای الکترونیکی</td>
                                <td>بلندگو</td>
                                <td class="width-16-rem text-left">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                            role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="#" class="dropdown-item text-right"><i class="fa fa-images"></i>
                                                گالری</a>
                                            <a href="#" class="dropdown-item text-right"><i class="fa fa-list-ul"></i>
                                                فرم کالا</a>
                                            <a href="#" class="dropdown-item text-right"><i class="fa fa-edit"></i>
                                                ویرایش</a>
                                                <form action="" method="POST">
                                                    <button type="submit" class="dropdown-item text-right"><i
                                                        class="fa fa-window-close"></i> حذف</button>
                                                </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
