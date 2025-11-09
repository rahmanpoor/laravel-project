@extends('admin.layouts.master')

@section('head-tag')
    <title>تنظیمات فوتر</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فوتر</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">مزایای فروشگاه</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مزایای فروشگاه
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.footer.feature.create') }}" class="btn btn-info btn-sm">ایجاد ویژگی </a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان ویژگی</th>
                                <th>آدرس</th>
                                <th>تصویر</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($features as $key => $feature)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $feature->title }}</td>
                                    <td>{{ $feature->url ? $feature->url : '-' }}</td>
                                    <td>
                                        <img src="{{ asset($feature->image) }}"
                                            alt="" width="30" height="30">
                                    </td>


                                    <td class="width-16-rem text-left">
                                        <form class="d-inline"
                                            action="{{ route('admin.footer.feature.destroy', $feature->id) }}"
                                            method="post">
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

            </section>
        </section>
    </section>
@endsection
@section('script')


@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete']);

@endsection
