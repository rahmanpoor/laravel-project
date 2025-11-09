@extends('admin.layouts.master')



@section('head-tag')
    <title>
        پرداخت ها</title>
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


                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>مبلغ پرداختی</th>
                                <th>کد تراکنش</th>
                                <th class="max-width-16-rem text-left"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>


                                    <td>{{ $payment->user->fullName }}</td>
                                    <td>
                                        @if ($payment->status == 0)
                                            <h5><span class="badge bg-primary text-white rounded-pill">در انتظار پرداخت </span>
                                            </h5>
                                        @elseif($payment->status == 1)
                                            <h5><span class="badge bg-success rounded-pill text-white">پرداخت موفق</span></h5>
                                        @elseif($payment->status == 2)
                                            <h5><span class="badge bg-danger rounded-pill text-white">پرداخت ناموفق</span></h5>

                                        @endif
                                    </td>

                                    <td>{{ priceFormat($payment->amount) }} تومان</td>

                                     <td>{{ $payment->paymentable->transaction_id ?? '-' }}</td>

                                    <td class="width-22-rem text-left">
                                        <a href="{{ route('admin.market.payment.show', $payment->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('admin.market.payment.canceled', $payment->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
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
