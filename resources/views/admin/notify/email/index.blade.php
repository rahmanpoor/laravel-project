@extends('admin.layouts.master')



@section('head-tag')
    <title>اطلاعیه ایمیلی</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#"> اطلاع رسانی</a></li>
            <li class="breadcrumb-item active" aria-current="page"> اطلاعیه ایمیلی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        اطلاعیه ایمیلی
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.notify.email.create') }}" class="btn btn-info btn-sm">ایجاد اطلاعیه ایمیلی</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان اطلاعیه</th>
                                <th>متن اطلاعیه</th>
                                <th>تاریخ ارسال</th>
                                <th>وضعیت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emails as $key => $email)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $email->subject }}</td>
                                    <td>{{ $email->body }}</td>
                                    <td>{{ jalalidate($email->published_at, 'H:i:s Y/m/d') }}</td>
                                    <td>
                                        <label class="apple-switch">
                                            <input id="{{ $email->id }}" onchange="changeStatus({{ $email->id }})"
                                                data-url="{{ route('admin.notify.email.status', $email->id) }}"
                                                type="checkbox" @if ($email->status === 1) checked @endif>
                                            <span class="apple-slider"></span>
                                        </label>
                                    </td>
                                    <td class="width-24-rem text-left">
                                        <a href="{{ route('admin.notify.email-file.index', $email->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-file"></i> فایل های ضمیمه شده</a>
                                        <a href="{{ route('admin.notify.email.edit', $email->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                        <form class="d-inline"
                                            action="{{ route('admin.notify.email.destroy', $email->id) }}" method="post">
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
    <script>
        function changeStatus(id) {
            var element = $("#" + id);
            var url = element.attr('data-url');
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true)
                            successToast('ایمیل با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false)
                            successToast('ایمیل با موفقیت غیر فعال شد')
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error: function() {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            })

            function successToast(message) {

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })

            }
        }
    </script>

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete']);
@endsection
