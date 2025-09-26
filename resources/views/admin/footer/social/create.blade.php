@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد شبکه اجتماعی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فوتر</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد شبکه اجتماعی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد شبکه اجتماعی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.footer.social.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.footer.social.store') }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        <section class="row">







                             <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="social_icons">شبکه اجتماعی</label>
                                        <select name="icon" id="icon" class="form-control form-control-sm">
                                            @foreach ($social_icons as $key => $social_icon)
                                            <option value="{{ $social_icon }}" >{{ $social_icon }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                @error('icon')
                                    <span class="alert_required text-danger p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>



                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">آدرس URL</label>
                                    <input type="text" name="url" value="{{ old('url') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('url')
                                    <span class="alert_required text-danger p-1" role="alert">
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


