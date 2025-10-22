@extends('admin.layouts.master')

@section('head-tag')
    <title>برند</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> برند ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        برند ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.brand.create') }}" class="btn btn-info btn-sm">ایجاد برند </a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام فارسی برند</th>
                                <th>نام اصلی برند</th>
                                <th>لوگو</th>
                                <th class="max-width-16-rem text-left"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $key => $brand)
                                <tr>
                                    <th>{{ $brands->firstItem() + $key }}</th>
                                    <td>{{ $brand->persian_name }}</td>
                                    <td>{{ $brand->original_name }}</td>
                                    <td>
                                        @php
                                            $logoPath = null;

                                            if (
                                                !empty($brand->logo) &&
                                                isset($brand->logo['indexArray'], $brand->logo['currentImage'])
                                            ) {
                                                $logoPath =
                                                    $brand->logo['indexArray'][$brand->logo['currentImage']] ?? null;
                                            }

                                            $logoUrl = $logoPath ? asset($logoPath) : asset('images/no-photo.png'); // مسیر تصویر پیش‌فرض
                                        @endphp
                                        <img src="{{ $logoUrl }}" alt="{{ $brand->name ?? 'بدون نام' }}" width="45"
                                            height="35">
                                    </td>
                                    <td class="width-16-rem text-left">
                                        <a href="{{ route('admin.market.brand.edit', $brand->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.brand.destroy', $brand->id) }}" method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                    class="fa fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </section>

                <section class="col-12">
                    <section class="my-4 d-flex justify-content-center">
                        <nav>
                            {{ $brands->links('pagination::bootstrap-4') }}
                        </nav>
                    </section>
                </section>

            </section>
        </section>
    </section>
@endsection


@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
