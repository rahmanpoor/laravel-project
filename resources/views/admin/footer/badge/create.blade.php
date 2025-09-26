@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد نماد </title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فوتر</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد نماد</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                       ایجاد نماد
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.footer.badge.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.footer.badge.store') }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        <section class="row">










                            <section class="col-12">
                                <div class="form-group">
                                    <label for="title">عنوان نماد</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('title')
                                    <span class="alert_required text-danger p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>




                               <section class="col-12">
                                <div class="form-group">
                                    <label for="">اسکریپت</label>
                                    <textarea name="script" id="script" rows="6" class="form-control form-control-sm">{{ old('script') }}</textarea>
                                </div>
                                 @error('script')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>













                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection


