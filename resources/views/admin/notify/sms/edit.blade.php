@extends('admin.layouts.master')



@section('head-tag')
    <title>ویرایش اطلاعیه پیامکی</title>
    <link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item"> <a href="#"> اطلاع رسانی</a></li>
            <li class="breadcrumb-item"> <a href="#"> اطلاعیه پیامکی</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ویرایش اطلاعیه پیامکی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش اطلاعیه پیامکی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.notify.sms.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.notify.sms.update', $sms->id) }}" id="form') }}" method="post"
                        id="form">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان پیامک</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-sm"
                                        value="{{ old('title', $sms->title) }}">
                                </div>
                                @error('title')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input type="text" name="published_at" id="published_at"
                                        class="form-control form-control-sm d-none" value="{{ $sms->published_at }}">
                                    <input type="text" id="published_at_view" class="form-control form-control-sm"
                                        value="{{ $sms->published_at }}">
                                </div>
                                @error('published_at')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if (old('status', $sms->status) == 0) selected @endif>غیرفعال
                                        </option>
                                        <option value="1" @if (old('status', $sms->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="alert_required text-danger p-1">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="body">متن پیامک</label>
                                    <textarea name="body" id="body" rows="6" class="form-control form-control-sm">{{ old('body', $sms->body) }}</textarea>
                                </div>
                                @error('body')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
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

@section('script')
    <script src="{{ asset('admin-asset/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            })
        });
    </script>
@endsection
