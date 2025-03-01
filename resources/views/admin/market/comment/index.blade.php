@extends('admin.layouts.master')



@section('head-tag')
    <title>نظرات</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> نظرات</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نظرات
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد نظر جدید</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نویسنده نظر</th>
                                <th>کد کاربر</th>
                                <th>کد کالا</th>
                                <th>کالا</th>
                                <th>وضعیت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>سهیل کاشانی</td>
                                <td>3878646</td>
                                <td>4764374</td>
                                <td>شارژر type C</td>
                                <td>در انتظار تایید</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.comment.show') }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-check"></i> تایید</button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>کامران محمدی</td>
                                <td>3878364</td>
                                <td>4764367</td>
                                <td>شیائومی note 20</td>
                                <td>تایید شده</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.comment.show') }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                    <button class="btn btn-warning btn-sm" type="submit"><i class="fa fa-clock"></i> عدم تایید</button>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>پژمان وطن خواه</td>
                                <td>3878929</td>
                                <td>4764543</td>
                                <td>ساعت هوشمند apple watch</td>
                                <td>در انتظار تایید</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.comment.show') }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-check"></i> تایید</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>


@endsection
