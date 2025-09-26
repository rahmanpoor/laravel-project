@extends('admin.layouts.master')

@section('head-tag')
    <title>تنظیمات فوتر</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فوتر</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تنظیمات</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تنظیمات فوتر
                    </h5>
                </section>


                <section>
                    <form action="{{ route('admin.footer.setting.update') }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        @method('PUT')
                        <section class="row">

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">عنوان</label>
                                    <input type="text" class="form-control form-control-sm" name="title"
                                        value="{{ old('title', $footerSetting->title) }}">
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
                                    <label for="">توضیحات</label>
                                    <textarea name="description" id="description" rows="6" class="form-control form-control-sm">{{ old('description', $footerSetting->description) }}</textarea>
                                </div>
                                 @error('description')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>



                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">© کپی رایت</label>
                                    <input type="text" name="copyright" value="{{ old('copyright', $footerSetting->copyright) }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('copyright')
                                    <span class="alert_required text-danger p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>












                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ذخیره</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection


