@extends('admin.layouts.master')

@section('head-tag')
    <title>داشبورد اصلی</title>
@endsection

@section('content')
    <section class="row">

        <section class="col-lg-3 col-md-6 col-12">
            <a href="#" class="text-decoration-none d-block mb-4">
                <section class="card  text-success">
                    <section class="card-body">
                        <section class="d-flex justify-content-between">
                            <section class="info-box-body">
                                <h5>30,200 تومان</h5>
                                <p>مجموع فروش امروز</p>
                            </section>
                            <section class="info-box-icon">
                                <i class="fas fa-chart-bar"></i>
                            </section>
                        </section>
                    </section>
                    <section class="card-footer info-box-footer">
                        <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42
                    </section>
                </section>
            </a>
        </section>
        <section class="col-lg-3 col-md-6 col-12">
            <a href="#" class="text-decoration-none d-block mb-4">
                <section class="card  text-danger">
                    <section class="card-body">
                        <section class="d-flex justify-content-between">
                            <section class="info-box-body">
                                <h5>{{ $users->count() }}</h5>
                                <p> تعداد کل کاربران</p>
                            </section>
                            <section class="info-box-icon">
                                <i class="fas fa-users"></i>
                            </section>
                        </section>
                    </section>
                    <section class="card-footer info-box-footer">
                        <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(optional($users->sortByDesc('updated_at')->first())->updated_at)}}
                    </section>
                </section>
            </a>
        </section>
        <section class="col-lg-3 col-md-6 col-12">
            <a href="#" class="text-decoration-none d-block mb-4">
                <section class="card  text-primary">
                    <section class="card-body">
                        <section class="d-flex justify-content-between">
                            <section class="info-box-body">
                                <h5>55</h5>
                                <p>بازدید امروز</p>
                            </section>
                            <section class="info-box-icon">
                                <i class="fas fa-eye"></i>
                            </section>
                        </section>
                    </section>
                    <section class="card-footer info-box-footer">
                        <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                    </section>
                </section>
            </a>
        </section>
        <section class="col-lg-3 col-md-6 col-12">
            <a href="#" class="text-decoration-none d-block mb-4">
                <section class="card text-dark">
                    <section class="card-body">
                        <section class="d-flex justify-content-between">
                            <section class="info-box-body">
                                <h5>3</h5>
                                <p>تعداد سفارش امروز</p>
                            </section>
                            <section class="info-box-icon">
                                <i class="fas fa-box"></i>
                            </section>
                        </section>
                    </section>
                    <section class="card-footer info-box-footer">
                        <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                    </section>
                </section>
            </a>
        </section>








    </section>


@endsection
