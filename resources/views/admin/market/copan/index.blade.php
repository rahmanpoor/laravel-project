@extends('admin.layouts.master')



@section('head-tag')
    <title>کوپن تخفیف</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">کوپن تخفیف</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کوپن تخفیف
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.copan.create') }}" class="btn btn-info btn-sm">ایجاد کوپن تخفیف</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
            </section>
        </section>
    </section>

    <section class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>کد کوپن</th>
                    <th>درصد تخفیف</th>
                    <th>سقف تخفیف</th>
                    <th>نوع کوپن</th>
                    <th>تاریخ شروع</th>
                    <th>تاریخ پایان</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>hd84d8d</td>
                    <td>15%</td>
                    <td>25,000 تومان</td>
                    <td>عمومی</td>
                    <td>24 اردیبهشت 99</td>
                    <td>31 اردیبهست 99</td>
                    <td class="width-16-rem text-left">
                        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>ufi7f672</td>
                    <td>10%</td>
                    <td>8,000 تومان</td>
                    <td>خصوصی</td>
                    <td>24 اردیبهشت 99</td>
                    <td>31 اردیبهست 99</td>
                    <<td class="width-16-rem text-left">
                        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                        </td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>sm2d6ui</td>
                    <td>12%</td>
                    <td>30,000 تومان</td>
                    <td>عمومی</td>
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
@endsection
