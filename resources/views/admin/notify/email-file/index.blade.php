@extends('admin.layouts.master')



@section('head-tag')
    <title>فایل های ضمیمه شده ایمیل</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#"> ایمیل</a></li>
            <li class="breadcrumb-item active" aria-current="page"> فایل های ضمیمه شده ایمیل</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        فایل های ضمیمه شده ایمیل
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.notify.email-file.create', $email->id) }}" class="btn btn-info btn-sm">ایجاد فایل</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان ایمیل</th>
                                <th>سایز فایل</th>
                                <th>نوع فایل</th>
                                <th>وضعیت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($email->files as $key => $file)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $email->subject }}</td>
                                    <td>{{ $file->file_size }}</td>
                                    <td>{{ $file->file_type }}</td>
                                    <td>
                                        <label class="apple-switch">
                                            <input id="{{ $file->id }}" onchange="changeStatus({{ $file->id }})"
                                                data-url="{{ route('admin.notify.email-file.status', $file->id) }}"
                                                type="checkbox" @if ($file->status === 1) checked @endif>
                                            <span class="apple-slider"></span>
                                        </label>
                                    </td>
                                    <td class="width-24-rem text-left">
                                        <a href="{{ route('admin.notify.email-file.edit', $file->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                        <form class="d-inline"
                                            action="{{ route('admin.notify.email-file.destroy', $file->id) }}" method="post">
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
                            successToast('فایل با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false)
                            successToast('فایل با موفقیت غیر فعال شد')
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
