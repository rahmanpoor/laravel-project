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
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> همراه ما باشید</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                       ایجاد لینک شبکه اجتماعی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.footer.social.create') }}" class="btn btn-info btn-sm">ایجاد لینک شبکه اجتماعی </a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                 <th>شبکه اجتماعی</th>
                                <th>آدرس</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($socials as $key => $social)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td><i class="fab fa-{{ $social->icon }}"></i></td>
                                    <td>{{ $social->url ? $social->url : '-' }}</td>


                                    <td class="width-16-rem text-left">
                                        <form class="d-inline"
                                            action="{{ route('admin.footer.social.destroy', $social->id) }}"
                                            method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                    class="fa fa-trash-alt"></i> حذف</button>
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
