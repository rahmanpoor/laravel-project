@extends('admin.layouts.master')



@section('head-tag')
    <title>کاربران ادمین</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item"> <a href="#"> بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page"> کاربران ادمین</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                       کاربران ادمین
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.admin-user.create') }}" class="btn btn-info btn-sm">ایجاد ادمین جدید</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ایمیل</th>
                                <th>شماره موبایل</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>نقش</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>m.majidi@gmail.com</td>
                                <td>09176763254</td>
                                <td>مجید</td>
                                <td>مجیدی</td>
                                <td>سوپر ادمین</td>
                                <td class="width-22-rem text-left">
                                    <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> نقش</a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>m.majidi@gmail.com</td>
                                <td>09176763254</td>
                                <td>مجید</td>
                                <td>مجیدی</td>
                                <td>مدیر محتوا</td>
                                <td class="width-22-rem text-left">
                                    <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> نقش</a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>m.majidi@gmail.com</td>
                                <td>09176763254</td>
                                <td>مجید</td>
                                <td>مجیدی</td>
                                <td>پشتیبان فروش</td>
                                <td class="width-22-rem text-left">
                                    <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> نقش</a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
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
