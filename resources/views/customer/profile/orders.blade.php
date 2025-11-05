@extends('customer.layouts.master-two-col')


@section('head-tag')
    <title> سفارشات شما</title>
@endsection



@section('content')
    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">


                <!-- aside include -->
                @include('customer.layouts.partials.profile-sidebar')



                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تاریخچه سفارشات</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="d-flex justify-content-center my-4">


                            {{-- waiting pay btn --}}

                            @php
                                $type = request('type'); // مقدار type از query string
                            @endphp

                            {{-- current btn --}}
                            <a type="button"
                                class="btn {{ $type == 1 ? 'btn-info' : 'btn-outline-info' }} btn-sm mx-2 position-relative"
                                href="{{ route('customer.profile.orders', 'type=1') }}">
                                جاری
                                {{-- <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    4
                                    <span class="visually-hidden">current order</span>
                                </span> --}}
                            </a>

                            {{-- delivered btn --}}
                            <a type="button"
                                class="btn {{ $type == 2 ? 'btn-success' : 'btn-outline-success' }} btn-sm mx-2 position-relative"
                                href="{{ route('customer.profile.orders', 'type=2') }}">
                                تحویل شده
                                {{-- <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    4
                                    <span class="visually-hidden">delivered order</span>
                                </span> --}}
                            </a>

                            {{-- cancel btn --}}
                            <a type="button"
                                class="btn {{ $type == 3 ? 'btn-danger' : 'btn-outline-danger' }} btn-sm mx-2 position-relative"
                                href="{{ route('customer.profile.orders', 'type=3') }}">
                                لغو شده
                                {{-- <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    4
                                    <span class="visually-hidden">cancel order</span>
                                </span> --}}
                            </a>


                            {{-- <a class="btn btn-outline-primary btn-sm mx-1" href="{{ route('customer.profile.orders') }}">همه سفارشات</a>
                            <a class="btn btn-dark btn-sm mx-1" href="{{ route('customer.profile.orders', 'type=0') }}">بررسی نشده</a> --}}
                            {{-- <a class="btn btn-warning btn-sm mx-1" href="{{ route('customer.profile.orders', 'type=2') }}">تایید نشده</a> --}}
                            {{-- <a class="btn btn-primary btn-sm mx-1" href="{{ route('customer.profile.orders', 'type=5') }}">مرجوع شده</a> --}}
                        </section>


                        <!-- start content header -->
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                {{-- <h2 class="content-header-title content-header-title-small">
                                    جزئیات سفارش
                                </h2> --}}
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->


                        <section class="order-wrapper">


                            @forelse ($orders as $order)
                                <section class="order-item">
                                    <section class="d-flex justify-content-between">
                                        <section>
                                            <section class="order-item-date"><i class="fa fa-calendar-alt"></i>
                                                {{ jdate($order->created_at) }}
                                            </section>
                                            <section class="order-item-id"><i class="fa fa-id-card-alt"></i>کد سفارش :
                                                {{ $order->id }}</section>
                                            <section class="order-item-id"><i class="fa fa-money-bill"></i>مبلغ :
                                                {{ priceFormat($order->order_final_amount) }} تومان</section>
                                            <section class="order-item-status text-{{ $order->orderStatusValue['color'] }}">
                                                <i class="fa fa-clock text-{{ $order->orderStatusValue['color'] }}"></i>
                                                {{ $order->orderStatusValue['result'] }}
                                            </section>
                                        </section>
                                    </section>

                                    @if (filled($order->tracking_code))
                                    <div class="alert alert-info small py-3 mb-3  mx-0" role="alert">
                                        <p class="mb-2">با استفاده از سامانه رهگیری پست می‌توانید از وضعیت مرسوله باخبر
                                            شوید.</p>
                                        <hr class="my-2">
                                        <span>کد رهگیری پست:</span>
                                        <span
                                            class="fw-bold text-monospace ms-5 d-inline-block">{{ convertEnglishToPersian($order->tracking_code) }}</span>
                                    </div>
                                    @endif

                                    <section class="order-item-products">
                                        @foreach ($order->orderItems as $orderItem)
                                            <a class="position-relative"
                                                href="{{ route('customer.market.product', json_decode($orderItem->product)->slug) }}">
                                                <img class="img-thumbnail rounded"
                                                    src="{{ asset(json_decode($orderItem->product)->image->indexArray->small) }}"
                                                    alt="{{ json_decode($orderItem->product)->name }}">
                                                @if ($orderItem->number > 1)
                                                    <span
                                                        class="position-absolute top-100 start-100 translate-middle badge rounded-pill bg-primary">{{ convertEnglishToPersian($orderItem->number) }}</span>
                                                @endif
                                            </a>
                                        @endforeach
                                    </section>
                                </section>

                            @empty

                                <section class="order-item">
                                    <div class="alert alert-info" role="alert">
                                        هیچ سفارشی وجود ندارد
                                    </div>
                                </section>
                            @endforelse

                        </section>

                        <section class="col-12">
                            <section class="my-4 d-flex justify-content-center">
                                <nav>
                                    {{ $orders->links('pagination::bootstrap-4') }}
                                </nav>
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
    <script>
        //js
    </script>
@endsection
