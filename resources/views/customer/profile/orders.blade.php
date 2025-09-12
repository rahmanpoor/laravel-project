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

                            {{-- current btn --}}
                            <a type="button" class="btn btn-info btn-sm mx-2 position-relative"
                                href="{{ route('customer.profile.orders', 'type=1') }}">
                                جاری
                                {{-- <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    4
                                    <span class="visually-hidden">current order</span>
                                </span> --}}
                            </a>

                            {{-- delivered btn --}}
                            <a type="button" class="btn btn-success btn-sm mx-2 position-relative"
                                href="{{ route('customer.profile.orders', 'type=2') }}">
                                تحویل شده
                                {{-- <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    4
                                    <span class="visually-hidden">delivered order</span>
                                </span> --}}
                            </a>

                            {{-- cancel btn --}}
                            <a type="button" class="btn btn-danger btn-sm mx-2 position-relative"
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
                                <h2 class="content-header-title content-header-title-small">
                                    در انتظار پرداخت
                                </h2>
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
                                            <section
                                                class="order-item-status text-{{ $order->paymentStatusValue['badge_color'] }}">
                                                <i
                                                    class="fa fa-clock text-{{ $order->paymentStatusValue['badge_color'] }} "></i>
                                                {{ $order->paymentStatusValue['result'] }}
                                            </section>
                                            <section class="order-item-products">
                                                @foreach ($order->orderItems as $orderitem)

                                                    <a href="{{   route('customer.market.product', $orderitem->product['slug'])   }}">
                                                           <img
                                                            src="{{ $orderitem->product['image']['indexArray']['medium'] }}"

                                                            alt="{{ $orderitem->product['name'] }}"></a>
                                                @endforeach
                                            </section>
                                        </section>
                                        <section class="order-item-link"><a href="#">پرداخت سفارش</a></section>
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
