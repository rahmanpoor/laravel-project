@extends('admin.layouts.master')



@section('head-tag')
    <title>روش های ارسال</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> روش های ارسال</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                         روش های ارسال
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.delivery.create') }}" class="btn btn-info btn-sm">ایجاد روش های ارسال</a>
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
                    <th>نام روش ارسال</th>
                    <th>هزینه ارسال</th>
                    <th>زمان ارسال</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>پست پیشتاز</td>
                    <td>26,000 تومان</td>
                    <td>حداکثر دو روز کاری</td>
                    <td class="width-16-rem text-left">
                        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>پیک موتوری</td>
                    <td>8,000 تومان</td>
                    <td>حداکثر 2 ساعت</td>
                    <td class="width-16-rem text-left">
                        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                    </td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>تی پاکس</td>
                    <td>16,000 تومان</td>
                    <td>حداکثر 48 ساعت</td>
                    <td class="width-16-rem text-left">
                        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
