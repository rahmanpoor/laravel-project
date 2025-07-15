@extends('admin.layouts.master')



@section('head-tag')
    <title> پرداخت ها</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> پرداخت ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پرداخت ها
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info btn-sm disabled">پرداخت جدید</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد تراکنش</th>
                                <th>بانک</th>
                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>نوع پرداخت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $payment->paymentable->transaction_id ?? '-' }}</td>
                                    <td>{{ $payment->paymentable->gateway ?? '-' }}</td>
                                    <td>{{ $payment->user->fullName }}</td>
                                    <td>@if ($payment->status == 0 ) <h5><span class="badge bg-primary text-white rounded-pill">پرداخت نشده</span></h5> @elseif($payment->status == 1)<h5><span class="badge bg-success rounded-pill text-white">پرداخت</span></h5> @elseif($payment->status == 2) <h5><span class="badge bg-danger rounded-pill text-white">باطل شده</span></h5> @else  <h5><span class="badge bg-warning rounded-pill">برگشت داده شده</span></h5>  @endif</td>
                                    <td> @if ($payment->type == 0 ) آنلاین @elseif($payment->type == 1) آفلاین @else  در محل @endif </td>
                                    <td class="width-22-rem text-left">
                                        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> مشاهده</a>
                                        <a href="{{ route('admin.market.payment.canceled', $payment->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> باطل
                                            کردن</a>
                                        <a href="{{ route('admin.market.payment.returned', $payment->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-reply"></i>
                                            برگرداندن</a>
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
