@extends('admin.layouts.master')



@section('head-tag')
    <title> پرداخت ها</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">  پرداخت ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پرداخت ها
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info btn-sm disabled">پرداخت جدید</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد تراکنش</th>
                                <th>بانک</th>
                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>نوع پرداخت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>322483325</td>
                                <td>ملت</td>
                                <td>محمد احمدی</td>
                                <td>تایید شده</td>
                                <td>آفلاین</td>
                                <td class="width-22-rem text-left">
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> مشاهده</a>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> باطل کردن</a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> برگرداندن</a>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>322483324</td>
                                <td>ملت</td>
                                <td>حبیب طاهری</td>
                                <td>تایید شده</td>
                                <td>آنلاین</td>
                                <td class="width-22-rem text-left">
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> مشاهده</a>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> باطل کردن</a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> برگرداندن</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>


@endsection
