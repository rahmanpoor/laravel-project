@extends('admin.layouts.master')



@section('head-tag')
    <title>انبار</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> انبار</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                       انبار
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد انبار جدید</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hovers">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>موجودی</th>
                                <th>ورودی انبار</th>
                                <th>خروجی انبار</th>
                                <th class="max-width-8-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>آیفون 16</td>
                                <td><img src="{{ asset('admin-asset/images/iphone 16.jpg') }}" class="max-height-3-rem"
                                        alt="LED"></td>
                                <td>16</td>
                                <td>38</td>
                                <td>22</td>
                                <td class="width-22-rem text-left">
                                    <a href="{{ route('admin.market.store.add-to-store'); }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> افزایش موجودی</a>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>  اصلاح موجودی</a>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>بلندگو</td>
                                <td><img src="{{ asset('admin-asset/images/speaker.jpg') }}" class="max-height-3-rem"
                                        alt="LED"></td>
                                <td>16</td>
                                <td>38</td>
                                <td>22</td>
                                <td class="width-22-rem text-left">
                                    <a href="{{ route('admin.market.store.add-to-store'); }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> افزایش موجودی</a>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>  اصلاح موجودی</a>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>LED سامسونگ</td>
                                <td><img src="{{ asset('admin-asset/images/led.jpg') }}" class="max-height-3-rem"
                                        alt="LED"></td>
                                <td>16</td>
                                <td>38</td>
                                <td>22</td>
                                <td class="width-22-rem text-left">
                                    <a href="{{ route('admin.market.store.add-to-store'); }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> افزایش موجودی</a>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>  اصلاح موجودی</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
