@extends('admin.layouts.master')



@section('head-tag')
    <title>ویرایش پیج</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#"> پیج ساز</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ویرایش پیج</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش پیج
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.page.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.page.update', $page->id) }}" method="POST" id="form">
                         @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">عنوان</label>
                                    <input type="text" class="form-control form-control-sm" name="title" id="title"
                                        value="{{ old('title', $page->title) }}">
                                </div>
                                @error('title')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                                        value="{{ old('tags', $page->tags) }}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                </div>
                                @error('tags')
                                    <span class="alert_required text-danger p-1">
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
                                        <option value="0" @if (old('status', $page->status) == 0) selected @endif>غیرفعال
                                        </option>
                                        <option value="1" @if (old('status', $page->status) == 1) selected @endif>فعال
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
                                    <label for="body">محتوا</label>
                                    <textarea name="body" id="body" rows="6" class="form-control form-control-sm">{{ old('body', $page->body) }}</textarea>
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
    <script src="{{ asset('admin-asset/ckeditor/ckeditor.js') }} "></script>
    <script>
        CKEDITOR.replace('body');
    </script>

       <script>
        $(document).ready(function() {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;


            if (tags_input.val() !=- null && tags_input.val().length > 0)
            {
                default_data = default_tags.split(',');
            }


            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد کنید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');

            $('#form').submit(function( event ) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            })
        })
    </script>
@endsection
