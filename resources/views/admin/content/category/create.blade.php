@extends('admin.layouts.master')



@section('head-tag')
    <title>ایجاد دسته بندی</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ایجاد دسته بندی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد دسته بندی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.category.store') }}" method="POST" enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">نام دسته</label>
                                    <input type="text" class="form-control form-control-sm" name="name"
                                        id="name" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm" name="tags"
                                        id="tags"  value="{{ old('tags') }}">
                                        <select class="select2 form-control form-control-sm" multiple id="select_tags" ></select>
                                </div>
                                @error('tags')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if (old('status') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
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
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image"
                                        id="image" >
                                </div>
                                @error('image')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 my-3">
                                <div class="form-group">
                                    <label for="description">توضیحات</label>
                                    <textarea name="description" id="description" rows="6" class="form-control form-control-sm">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
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
        CKEDITOR.replace('description');
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
