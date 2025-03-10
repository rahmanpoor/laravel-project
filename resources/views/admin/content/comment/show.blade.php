@extends('admin.layouts.master')



@section('head-tag')
    <title>نمایش نظرها</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item"> <a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#"> نظرات</a></li>
            <li class="breadcrumb-item active" aria-current="page"> نمایش نظرها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش نظرها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">
                    <section class="card-header bg-custom-yellow text-white">
                        کامران محمدی - 8456987456
                    </section>

                    <section class="card-body">
                        <h5>مشخصات کالا: ساعت هوشمند apple watch کد کالا : 8974938</h5>
                        <p>به نظر من ساعت خوبیه و تنها مشکلی که داره وزنش زیاده و زود شارژش تموم میشه!</p>
                    </section>
                </section>

                <section>
                    <form action="" method="">
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">پاسخ ادمین</label>
                                    <textarea class="form-control form-control-sm" rows="4"></textarea>
                                </div>
                            </section>
                        </section>
                        <section>
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
