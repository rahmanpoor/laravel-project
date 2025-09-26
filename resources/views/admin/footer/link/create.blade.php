@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد لینک فوتر</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فوتر</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد لینک</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد لینک
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.footer.link.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.footer.link.store') }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان</label>
                                    <input type="text" class="form-control form-control-sm" name="title"
                                        value="{{ old('title') }}">
                                </div>
                                @error('title')
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
                                <div class="form-group">
                                    <label for="">موقعیت</label>
                                        <select name="position" id="" class="form-control form-control-sm">
                                            @foreach ($positions as $key => $position)
                                            <option value="{{ $key }}" @if (old('position') == $key) selected @endif>{{ $position }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                @error('position')
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


