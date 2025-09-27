@extends('customer.layouts.master-two-col')


@section('head-tag')
    <title>مدیریت تیکت ها</title>
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
                                    <span>تیکت های من </span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="d-flex justify-content-center my-4">




                            {{-- <a class="btn btn-outline-primary btn-sm mx-1" href="{{ route('customer.profile.orders') }}">همه سفارشات</a>
                            <a class="btn btn-dark btn-sm mx-1" href="{{ route('customer.profile.orders', 'type=0') }}">بررسی نشده</a> --}}
                            {{-- <a class="btn btn-warning btn-sm mx-1" href="{{ route('customer.profile.orders', 'type=2') }}">تایید نشده</a> --}}
                            {{-- <a class="btn btn-primary btn-sm mx-1" href="{{ route('customer.profile.orders', 'type=5') }}">مرجوع شده</a> --}}
                        </section>





                        <section class="order-wrapper">



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
