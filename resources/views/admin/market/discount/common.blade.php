@extends('admin.layouts.master')



@section('head-tag')
    <title>تخفیف عمومی</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> تخفیف عمومی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                         تخیفیف عمومی
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route("admin.market.discount.commonDiscount.create")}}" class="btn btn-info btn-sm">ایجاد تخفیف عمومی</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>درصد تخفیف</th>
                                <th>سقف تخفیف</th>
                                <th>عنوان مناسبت</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>15%</td>
                                <td>25,000 تومان</td>
                                <td>نوروز</td>
                                <td>24 اردیبهشت 99</td>
                                <td>31 اردیبهست 99</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>10%</td>
                                <td>8,000 تومان</td>
                                <td>رمضان</td>
                                <td>24 اردیبهشت 99</td>
                                <td>31 اردیبهست 99</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                    </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>12%</td>
                                <td>30,000 تومان</td>
                                <td>روز زن</td>
                                <td>24 اردیبهشت 99</td>
                                <td>31 اردیبهست 99</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>


@endsection
