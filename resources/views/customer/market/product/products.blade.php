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
                <aside id="sidebar" class="sidebar col-md-3">


                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <form action="{{ route('customer.products') }}" method="GET" >
                            <!-- start sidebar nav-->
                            <section class="sidebar-nav">
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">کالای دیجیتال <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">خودرو ابزار و تجهیزات صنعتی <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">مد و پوشاک <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">اسباب بازی، کودک و نوزاد <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">کالاهای سوپرمارکتی <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">زیبایی و سلامت <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">خانه و آشپزخانه <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">کتاب، لوازم تحریر و هنر <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">ورزش و سفر <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <section class="sidebar-nav-item">
                                    <span class="sidebar-nav-item-title">محصولات بومی و محلی <i
                                            class="fa fa-angle-left"></i></span>
                                    <section class="sidebar-nav-sub-wrapper">
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="sidebar-nav-sub-item">
                                            <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                    موبایل</a><i class="fa fa-angle-left"></i></span>
                                            <section class="sidebar-nav-sub-sub-wrapper">
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                        موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                        نگهدارنده</a></section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                        بیسیم</a>
                                                </section>
                                                <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                </section>

                            </section>
                            <!--end sidebar nav-->
                    </section>

                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    جستجو در نتایج
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section class="">
                            <input class="sidebar-input-text" type="text" name="search"
                                value="{{ request()->search }}" placeholder="جستجو بر اساس نام، برند ...">
                        </section>
                    </section>

                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    برند
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section class="sidebar-brand-wrapper">
                            <section class="form-check sidebar-brand-item">
                                <input class="form-check-input" type="checkbox" value="1" id="1">
                                <label class="form-check-label d-flex justify-content-between" for="1">
                                    <span>شیائومی</span>
                                    <span>xiaomi</span>
                                </label>
                            </section>

                            <section class="form-check sidebar-brand-item">
                                <input class="form-check-input" type="checkbox" value="2" id="2">
                                <label class="form-check-label d-flex justify-content-between" for="2">
                                    <span>سامسونگ</span>
                                    <span>samsung</span>
                                </label>
                            </section>

                            <section class="form-check sidebar-brand-item">
                                <input class="form-check-input" type="checkbox" value="3" id="3">
                                <label class="form-check-label d-flex justify-content-between" for="3">
                                    <span>سونی</span>
                                    <span>sony</span>
                                </label>
                            </section>

                            <section class="form-check sidebar-brand-item">
                                <input class="form-check-input" type="checkbox" value="4" id="4">
                                <label class="form-check-label d-flex justify-content-between" for="4">
                                    <span>امرسان</span>
                                    <span>emersun</span>
                                </label>
                            </section>

                            <section class="form-check sidebar-brand-item">
                                <input class="form-check-input" type="checkbox" value="5" id="5">
                                <label class="form-check-label d-flex justify-content-between" for="5">
                                    <span>ال جی</span>
                                    <span>lg</span>
                                </label>
                            </section>

                            <section class="form-check sidebar-brand-item">
                                <input class="form-check-input" type="checkbox" value="6" id="6">
                                <label class="form-check-label d-flex justify-content-between" for="6">
                                    <span>جی پلاس</span>
                                    <span>g+</span>
                                </label>
                            </section>

                            <section class="form-check sidebar-brand-item">
                                <input class="form-check-input" type="checkbox" value="7" id="7">
                                <label class="form-check-label d-flex justify-content-between" for="7">
                                    <span>پارس خزر</span>
                                    <span>pars khazar</span>
                                </label>
                            </section>

                            <section class="form-check sidebar-brand-item">
                                <input class="form-check-input" type="checkbox" value="8" id="8">
                                <label class="form-check-label d-flex justify-content-between" for="8">
                                    <span>دیاموند</span>
                                    <span>diamond</span>
                                </label>
                            </section>
                        </section>
                    </section>



                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    محدوده قیمت
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <section class="sidebar-price-range d-flex justify-content-between">
                            <section class="p-1"><input type="text" name="min_price"
                                    value="{{ request()->min_price }}" placeholder="قیمت از ..."
                                   ></section>
                            <section class="p-1"><input type="text" name="max_price"
                                    value="{{ request()->max_price }}" placeholder="قیمت تا ..."
                                   ></section>
                        </section>
                    </section>



                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <section class="sidebar-filter-btn d-grid gap-2">
                            <button class="btn btn-danger" type="submit">اعمال فیلتر</button>
                        </section>
                    </section>
                    </form>

                </aside>
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">
                        <section class="filters mb-3">
                            <span class="d-inline-block border p-1 rounded bg-light">نتیجه جستجو برای : <span
                                    class="badge bg-info text-dark">"کتاب اثر مرک"</span></span>
                            <span class="d-inline-block border p-1 rounded bg-light">برند : <span
                                    class="badge bg-info text-dark">"کتاب"</span></span>
                            <span class="d-inline-block border p-1 rounded bg-light">دسته : <span
                                    class="badge bg-info text-dark">"کتاب"</span></span>
                            <span class="d-inline-block border p-1 rounded bg-light">قیمت از : <span
                                    class="badge bg-info text-dark">25,000 تومان</span></span>
                            <span class="d-inline-block border p-1 rounded bg-light">قیمت تا : <span
                                    class="badge bg-info text-dark">360,000 تومان</span></span>

                        </section>
                        <section class="sort ">
                            <span>مرتب سازی بر اساس : </span>
                            <a class="btn {{ request()->sort == 1 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0"
                                href="{{ route('customer.products', ['search' => request()->search, 'sort' => 1]) }}">جدیدترین</a>
                            <a class="btn {{ request()->sort == 2 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0"
                                href="{{ route('customer.products', ['search' => request()->search, 'sort' => 2]) }}">گران
                                ترین</a>
                            <a class="btn {{ request()->sort == 3 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0"
                                href="{{ route('customer.products', ['search' => request()->search, 'sort' => 3]) }}">ارزان
                                ترین</a>
                            <a class="btn {{ request()->sort == 4 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0"
                                href="{{ route('customer.products', ['search' => request()->search, 'sort' => 4]) }}">پربازدیدترین</a>
                            <a
                                class="btn {{ request()->sort == 5 ? 'btn-info' : 'btn-light' }} btn-sm px-1 py-0"href="{{ route('customer.products', ['search' => request()->search, 'sort' => 5]) }}">پرفروش
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



                            <section class="col-12">
                                <section class="my-4 d-flex justify-content-center">
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </section>
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

    {{-- <script>
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

            if (value) {
                input.value = Number(value).toLocaleString('fa-IR');
                input.selectionStart = input.selectionEnd = cursorPosition + (input.value.length - value.length);
            } else {
                input.value = "";
            }
        }

        // قبل از submit، همه کاماها را از input حذف می‌کنیم
        function removeCommasBeforeSubmit(form) {
            ['min_price', 'max_price'].forEach(id => {
                const input = form.querySelector(`#${id}`);
                if (input) {
                    let value = persianToEnglishNumbers(input.value);
                    value = value.replace(/,/g, ''); // حذف کاما
                    input.value = value;
                }
            });
            return true; // اجازه submit فرم
        }
    </script> --}}
@endsection
