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
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد سفارش جدید</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام مشتری</th>
                                <th>تاریخ ثبت سفارش</th>
                                <th>مبلغ کل</th>
                                <th>وضعیت پرداخت</th>
                                <th>وضعیت ارسال</th>
                                <th>کد رهگیری پستی</th>
                                <th class="max-width-8-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $order->user->full_name ?? '-' }}</td>
                                    <td>{{ jalaliDate($order->created_at) }}</td>
                                    <td>{{ priceFormat($order->order_final_amount - $order->order_discount_amount ) }} تومان</td>
                                    <td>
                                        <h5><span
                                                class="badge bg-{{ $order->payment_status_value['badge_color'] }} text-white rounded-pill">{{ $order->payment_status_value['result'] }}</span>
                                        </h5>
                                    </td>

                                    <td>
                                        <h6><span
                                                class="text-{{ $order->order_status_value['color'] }}">{{ $order->order_status_value['result'] }}</span>
                                        </h6>
                                    </td>

                                    <td>{{ $order->tracking_code ?? 'هنوز ارسال نشده' }}</td>


                                    <td class="width-8-rem text-left">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                                role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-tools"></i> عملیات</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a href="{{ route('admin.market.order.show', $order->id) }}"
                                                    class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده
                                                    فاکتور</a>
                                                <a href="{{ route('admin.market.order.tracking-code', $order->id) }}"
                                                    class="dropdown-item text-right"><i class="fa fa-edit"></i> تحویل
                                                    سفارش</a>
                                                <a href="{{ route('admin.market.order.cancelOrder', $order->id) }}"
                                                    class="dropdown-item text-right"><i class="fa fa-window-close"></i> باطل
                                                    کردن سفارش</a>
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
