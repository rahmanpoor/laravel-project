@extends('admin.layouts.master')



@section('head-tag')
    <title>
        سفارشات</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> سفارشات</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        سفارشات
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.brand.create') }}" class="btn btn-info btn-sm">ایجاد سفارش جدید</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد سفارش</th>
                                <th>مجموع مبلغ سفارش (بدون تخفیف)</th>
                                <th>مجموع تمامی مبلغ تخفیفات</th>
                                <th>مبلغ نهایی</th>
                                <th>وضعیت پرداخت</th>
                                <th>شیوه پرداخت</th>
                                <th>بانک</th>
                                <th>وضعیت ارسال</th>
                                <th>شیوه ارسال</th>
                                <th>وضعیت سفارش</th>
                                <th class="max-width-8-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_final_amount }} تومان</td>
                                    <td>{{ $order->order_discount_amount }} تومان</td>
                                    <td>{{ $order->order_final_amount - $order->order_discount_amount }} تومان</td>
                                    <td>
                                        @if ($order->payment_status == 0)
                                            <h5><span class="badge bg-primary text-white rounded-pill">پرداخت نشده</span>
                                            </h5>
                                        @elseif($order->payment_status == 1)
                                            <h5><span class="badge bg-success rounded-pill text-white">پرداخت</span></h5>
                                        @elseif($order->payment_status == 2)
                                            <h5><span class="badge bg-danger rounded-pill text-white">باطل شده</span></h5>
                                        @else
                                            <h5><span class="badge bg-warning rounded-pill">برگشت داده شده</span></h5>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->payment_type == 0)
                                            آنلاین
                                        @elseif($order->payment_type == 1)
                                            آفلاین
                                        @else
                                            در محل
                                        @endif
                                    </td>
                                    <td>{{ $order->payment->paymentable->gateway ?? '-' }}</td>
                                    <td>
                                        @if ($order->delivery_status == 0)
                                            <h5><span class="badge bg-secondary text-white rounded-pill">ارسال نشده</span>
                                            </h5>
                                        @elseif($order->delivery_status == 1)
                                            <h5><span class="badge bg-warning rounded-pill">در حال ارسال</span>
                                            @elseif($order->delivery_status == 2)
                                                <h5><span class="badge bg-primary text-white rounded-pill">ارسال شده</span>
                                                </h5>
                                            @else
                                                <h5><span class="badge bg-success text-white rounded-pill">تحویل شده</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->delivery->name }}</td>
                                    <td>
                                        @if ($order->order_status == 0)
                                            <h5><span class="badge  text-danger ">بررسی نشده</span>
                                            </h5>
                                        @elseif ($order->order_status == 1)
                                            <h5><span class="badge bg-warning rounded-pill">در انتظار تایید</span>
                                            </h5>
                                        @elseif($order->order_status == 2)
                                            <h5><span class="badge bg-secondary text-white rounded-pill">تایید نشده</span>
                                            </h5>
                                        @elseif($order->order_status == 3)
                                            <h5><span class="badge bg-success text-white rounded-pill">تایید شده</span>
                                            </h5>
                                        @elseif ($order->order_status == 4)
                                            <h5><span class="badge bg-danger text-white rounded-pill">باطل شده</span>
                                            </h5>
                                        @elseif($order->order_status == 5)
                                            <h5><span class="badge bg-dark text-white  rounded-pill">مرجوع شده</span>
                                        @endif
                                    </td>
                                    <td class="width-8-rem text-left">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                                role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a href="{{ route('admin.market.order.show', $order->id) }}" class="dropdown-item text-right"><i
                                                        class="fa fa-images"></i> مشاهده فاکتور</a>
                                                <a href="{{ route('admin.market.order.changeSendStatus', $order->id) }}"
                                                    class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغییر
                                                    وضعیت ارسال</a>
                                                <a href="{{ route('admin.market.order.changeOrderStatus', $order->id) }}"
                                                    class="dropdown-item text-right"><i class="fa fa-edit"></i> تغییر وضعیت
                                                    سفارش</a>
                                                <a href="{{ route('admin.market.order.cancelOrder', $order->id) }}" class="dropdown-item text-right"><i
                                                        class="fa fa-window-close"></i> باطل کردن سفارش</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
