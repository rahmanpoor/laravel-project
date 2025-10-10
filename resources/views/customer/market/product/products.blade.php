@extends('customer.layouts.master-one-col')


@section('head-tag')
<link href="{{ asset('admin-asset\sweetalert\sweetalert2.css') }}" rel="stylesheet" />
    <meta name="description" content="{{ $setting->description }}">
    <meta name="keywords" content="{{ $setting->keywords }}">
    <title>{{ $setting->title }}</title>
@endsection

@section('content')
    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
             <!-- sidebar -->
              @include('customer.layouts.partials.sidebar')
            <!-- end sidebar -->
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">
                        <section class="filters mb-3">

                            @if (request()->filled('search'))
                                <span class="d-inline-block border p-1 rounded bg-light">نتیجه جستجو برای : <span
                                        class="badge bg-info text-dark">{{ request()->search }}</span></span>
                            @endif

                            @if (request()->filled('brands'))
                                <span class="d-inline-block border p-1 rounded bg-light">برند : <span
                                        class="badge bg-info text-dark"> {{ implode('، ', $brandNames) }}</span></span>
                            @endif

                            @if (request()->category)
                                <span class="d-inline-block border p-1 rounded bg-light">دسته : <span
                                        class="badge bg-info text-dark">{{ request()->category->name }}</span></span>
                            @endif


                            @if (request()->filled('min_price'))
                                <span class="d-inline-block border p-1 rounded bg-light">قیمت از : <span
                                        class="badge bg-info text-dark">{{ priceFormat(request()->min_price) }}
                                        تومان</span></span>
                            @endif



                            @if (request()->filled('max_price'))
                                <span class="d-inline-block border p-1 rounded bg-light">قیمت تا : <span
                                        class="badge bg-info text-dark">{{ priceFormat(request()->max_price) }}
                                        تومان</span></span>
                            @endif

                        </section>
                        <section class="sort ">
                            <span>مرتب سازی بر اساس : </span>
                            <a class="btn {{ request()->sort == 1 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0"
                                href="{{ route('customer.products', ['category' => request()->category ?  request()->category->id : null, 'search' => request()->search, 'sort' => 1, 'min_price' => request()->min_price, 'max_price' => request()->max_price, 'brands' => request()->brands]) }}">جدیدترین</a>
                            <a class="btn {{ request()->sort == 2 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0"
                                href="{{ route('customer.products', ['category' => request()->category ?  request()->category->id : null, 'search' => request()->search, 'sort' => 2, 'min_price' => request()->min_price, 'max_price' => request()->max_price, 'brands' => request()->brands]) }}">گران
                                ترین</a>
                            <a class="btn {{ request()->sort == 3 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0"
                                href="{{ route('customer.products', ['category' => request()->category ?  request()->category->id : null, 'search' => request()->search, 'sort' => 3, 'min_price' => request()->min_price, 'max_price' => request()->max_price, 'brands' => request()->brands]) }}">ارزان
                                ترین</a>
                            <a class="btn {{ request()->sort == 4 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0"
                                href="{{ route('customer.products', ['category' => request()->category ?  request()->category->id : null, 'search' => request()->search, 'sort' => 4, 'min_price' => request()->min_price, 'max_price' => request()->max_price, 'brands' => request()->brands]) }}">پربازدیدترین</a>
                            <a class="btn {{ request()->sort == 5 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-
                                href="{{ route('customer.products', ['category' => request()->category ?  request()->category->id : null, 'search' => request()->search, 'sort' => 5, 'min_price' => request()->min_price, 'max_price' => request()->max_price, 'brands' => request()->brands]) }}">پرفروش
                                ترین</a>
                        </section>


                        <section class="main-product-wrapper row my-4">

                            @forelse ($products as $product)
                                <section class="col-md-3 p-0">
                                    <section class="product">
                                        <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip"
                                                data-bs-placement="left" title="افزودن به سبد خرید"><i
                                                    class="fa fa-cart-plus"></i></a></section>
                                        <section class="product-add-to-favorite"><a href="#"
                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                        <a class="product-link" href="#">
                                            <section class="product-image">
                                                <img class=""
                                                    src="{{ asset($product->image['indexArray']['medium']) }}"
                                                    alt="{{ $product->name }}">
                                            </section>
                                            <section class="product-colors"></section>
                                            <section class="product-name">
                                                <h3>{{ $product->name }}</h3>
                                            </section>
                                            <section class="product-price-wrapper">
                                                <section class="product-price">{{ priceFormat($product->price) }} تومان
                                                </section>
                                            </section>
                                        </a>
                                    </section>
                                </section>

                            @empty
                                <section>
                                    <div class="alert alert-info" role="alert">
                                        نتیجه ای یافت نشد
                                    </div>
                                </section>
                            @endforelse




                            <section class="my-4 d-flex justify-content-center border-0">
                                {{ $products->links('pagination::bootstrap-5') }}
                            </section>


                        </section>


                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->
@endsection





@section('scripts')
    @include('admin.alerts.sweetalert.success')
    @include('admin.alerts.sweetalert.error')
    <script src="{{ asset('admin-asset\sweetalert\sweetalert2.min.js') }}"></script>
    <script>
        $('.product-add-to-favorite button').click(function() {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function(result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن از علاقه مندی ها');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>


    <script>
        function persianToEnglishNumbers(str) {
            const persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            const english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            for (let i = 0; i < persian.length; i++) {
                str = str.replace(new RegExp(persian[i], 'g'), english[i]);
            }
            return str;
        }

        function formatNumber(input) {
            let cursorPosition = input.selectionStart;

            let value = input.value.replace(/[^\d\u06F0-\u06F9]/g, "");
            value = persianToEnglishNumbers(value);

            input.dataset.rawValue = value;

            if (value) {
                let formatted = Number(value).toLocaleString('fa-IR');
                input.value = formatted;
                input.selectionStart = input.selectionEnd = cursorPosition + (formatted.length - value.length);
            } else {
                input.value = "";
            }
        }

        function removeCommasBeforeSubmit(form) {
            let min = form.min_price.value;
            let max = form.max_price.value;

            // تبدیل فارسی به انگلیسی
            min = persianToEnglishNumbers(min);
            max = persianToEnglishNumbers(max);

            // حذف کاماها
            min = min.replace(/٬/g, '');
            max = max.replace(/٬/g, '');




            // اگر بخوای فرم ارسال بشه با مقادیر پاک شده
            form.min_price.value = min;
            form.max_price.value = max;
        }

        // اطمینان از اینکه فقط یک بار و تمیز submit می‌شه
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("filterForm");

            form.addEventListener("submit", function(e) {
                removeCommasBeforeSubmit(form);
                // نیازی به preventDefault و submit دستی نیست
                // چون فقط مقدار inputها رو اصلاح می‌کنیم و خودش ارسال می‌شه
            });
        });
    </script>
@endsection
