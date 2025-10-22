@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کالا</title>
    <link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کالا </a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کالا</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد کالا
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.product.store') }}" method="post" id="form"
                        enctype="multipart/form-data">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('name')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب دسته</label>
                                    <select name="category_id" id="" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}"
                                                @if (old('category_id') == $productCategory->id) selected @endif>
                                                {{ $productCategory->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب برند</label>
                                    <select name="brand_id" id="" class="form-control form-control-sm">
                                        <option value="">برند را انتخاب کنید</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                @if (old('brand_id') == $brand->id) selected @endif>
                                                {{ $brand->original_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('brand_id')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تصویر </label>
                                    <input type="file" name="image" class="form-control form-control-sm">
                                </div>
                                @error('image')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{-- <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">وزن</label>
                                    <input type="text" name="weight" value="{{ old('weight') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('weight')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">طول</label>
                                    <input type="text" name="length" value="{{ old('length') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('length')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عرض</label>
                                    <input type="text" name="width" value="{{ old('width') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('width')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">ارتفاع</label>
                                    <input type="text" name="height" value="{{ old('height') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('height')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section> --}}


                            <section class="col-12">
                                <div class="form-group">
                                    <label for="price">قیمت کالا (تومان)</label>
                                    <input type="text" name="price" id="price" value="{{ old('price') }}"
                                        class="form-control form-control-sm" oninput="formatPrice(this)">
                                </div>
                                @error('price')
                                    <span class="alert_required text-danger p-1">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea name="introduction" id="introduction" class="form-control form-control-sm" rows="6">{{ old('introduction') }}</textarea>
                                </div>
                                @error('introduction')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="" class="form-control form-control-sm"
                                        id="status">
                                        <option value="0" @if (old('status') == 0) selected @endif>غیرفعال
                                        </option>
                                        <option value="1" @if (old('status') == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{-- <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="marketable">قابل فروش بودن</label>
                                    <select name="marketable" id="" class="form-control form-control-sm"
                                        id="marketable">
                                        <option value="0" @if (old('marketable') == 0) selected @endif>غیرفعال
                                        </option>
                                        <option value="1" @if (old('marketable') == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('marketable')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section> --}}

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                                        value="{{ old('tags') }}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                    </select>
                                </div>
                                @error('tags')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{-- <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input type="text" name="published_at" id="published_at"
                                        class="form-control form-control-sm d-none">
                                    <input type="text" id="published_at_view" class="form-control form-control-sm">
                                </div>
                                @error('published_at')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section> --}}


                            <section class="col-12 border-top border-bottom py-3 mb-3">

                                <section class="row">

                                    <section class="col-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="meta_key[]" class="form-control form-control-sm"
                                                placeholder="ویژگی ...">
                                        </div>
                                        @error('meta_key.*')
                                            <span class="alert_required text-danger p-1">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror

                                    </section>

                                    <section class="col-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="meta_value[]"
                                                class="form-control form-control-sm" placeholder="مقدار ...">
                                        </div>
                                        @error('meta_value.*')
                                            <span class="alert_required text-danger p-1">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </section>

                                </section>

                                <section>
                                    <button type="button" id="btn-copy" class="btn btn-success btn-sm">افزودن</button>
                                </section>


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

@section('script')
    <script src="{{ asset('admin-asset/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-asset/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        CKEDITOR.replace('introduction');
    </script>
{{--
    <script>
        $(document).ready(function() {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            const $tagsInput = $('#tags');
            const $selectTags = $('#select_tags');

            // مقدار اولیه تگ‌ها
            let defaultData = [];
            if ($tagsInput.val()) {
                defaultData = $tagsInput.val().split(',');
            }

            // راه‌اندازی select2
            $selectTags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: defaultData
            });

            // انتخاب گزینه‌ها در select2
            $selectTags.val(defaultData).trigger('change');

            // قبل از ارسال فرم، مقدار select2 را به input اصلی منتقل کن
            $('#form').on('submit', function() {
                const selectedTags = $selectTags.val();
                if (selectedTags && selectedTags.length > 0) {
                    $tagsInput.val(selectedTags.join(','));
                }
            });
        });
    </script>


    <script>
        $(function() {
            $('#btn-copy').on('click', function() {
                const $rowToClone = $(this).parent().prev(); // المنت قبلی
                const $clone = $rowToClone.clone(true); // clone با event‌ها

                // پاک کردن مقادیر داخل input، textarea و select
                $clone.find('input, textarea, select').val('');

                $(this).before($clone); // قرار دادن قبل از دکمه
            });
        });
    </script>



    <script>
        // تبدیل اعداد فارسی به انگلیسی
        function persianToEnglishNumbers(str) {
            if (!str) return '';
            const persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            return str.replace(/[۰-۹]/g, d => persian.indexOf(d));
        }

        // تابع اصلی برای فرمت عدد
        function formatPrice(input) {
            const cursorPos = input.selectionStart;
            const raw = persianToEnglishNumbers(input.value.replace(/[^\d۰-۹]/g, ''));
            input.dataset.rawValue = raw;

            if (raw) {
                const formatted = Number(raw).toLocaleString('fa-IR');
                const diff = formatted.length - input.value.length;
                input.value = formatted;

                // تنظیم مجدد مکان‌نما تا پرش نکند
                const newPos = Math.max(cursorPos + diff, 0);
                input.setSelectionRange(newPos, newPos);
            } else {
                input.value = '';
            }
        }

        // حذف کاماها و تبدیل اعداد فارسی قبل از ارسال فرم
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('form');
            const priceInput = document.getElementById('price');

            form.addEventListener('submit', () => {
                let value = persianToEnglishNumbers(priceInput.value);
                value = value.replace(/٬|,/g, '');
                priceInput.value = value;
            });
        });
    </script>
@endsection
