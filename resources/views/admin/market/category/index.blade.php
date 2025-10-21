@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> دسته بندی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        دسته بندی
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.category.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی</a>
                    <section class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </section>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام دسته بندی</th>
                                <th>دسته والد</th>
                                <th>تصویر</th>
                                <th>وضعیت</th>
                                <th class="max-width-16-rem text-left"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($productCategories as $key => $productCategory)
                                <tr>
                                    <th>{{ $productCategories->firstItem() + $key }}</th>
                                    <td>{{ $productCategory->name }}</td>
                                    <td>{{ $productCategory->parent_id ? $productCategory->parent->name : 'دسته اصلی' }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($productCategory->image['indexArray'][$productCategory->image['currentImage']]) }}"
                                            alt="تصویر" width="45" height="35">
                                    </td>
                                    <td>
                                        <label class="apple-switch">
                                            <input id="{{ $productCategory->id }}"
                                                onchange="changeStatus({{ $productCategory->id }})"
                                                data-url="{{ route('admin.market.category.status', $productCategory->id) }}"
                                                type="checkbox" @if ($productCategory->status === 1) checked @endif>
                                            <span class="apple-slider"></span>
                                        </label>
                                    </td>
                                    <td class="width-16-rem text-left">
                                        <a href="{{ route('admin.market.category.edit', $productCategory->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.category.destroy', $productCategory->id) }}"
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
                <section class="col-12">
                    <section class="my-4 d-flex justify-content-center">
                        <nav>
                            {{ $productCategories->links('pagination::bootstrap-4') }}
                        </nav>
                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection



@section('script')
    <script>
        // ✅ تابع اصلی تغییر وضعیت
        function changeStatus(id) {
            const element = $("#" + id);
            const url = element.data('url');
            const previousState = element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        element.prop('checked', response.checked);

                        showToast(
                            response.checked ?
                            'دسته‌بندی با موفقیت فعال شد ✅' :
                            'دسته‌بندی با موفقیت غیرفعال شد ⚙️',
                            'success'
                        );
                    } else {
                        element.prop('checked', !previousState);
                        showToast('خطا هنگام بروزرسانی وضعیت دسته‌بندی ⚠️', 'error');
                    }
                },
                error: function() {
                    element.prop('checked', !previousState);
                    showToast('ارتباط با سرور برقرار نشد ❌', 'error');
                }
            });
        }

        // ✅ تابع نمایش toast عمومی
        function showToast(message, type = 'success') {
            const bgClass = type === 'success' ? 'bg-success' : 'bg-danger';
            const toastTag = `
            <section class="toast" data-delay="4000">
                <section class="toast-body py-3 d-flex ${bgClass} text-white rounded shadow-sm">
                    <strong class="ml-auto">${message}</strong>
                    <button type="button" class="mr-2 close text-white" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
            </section>
        `;

            const $toastWrapper = $('.toast-wrapper');
            if (!$toastWrapper.length) {
                $('body').append(
                    '<section class="toast-wrapper position-fixed p-3" style="top: 1rem; right: 1rem; z-index: 9999;"></section>'
                    );
            }

            $('.toast-wrapper').append(toastTag);
            $('.toast').toast('show').delay(4500).queue(function() {
                $(this).remove();
            });
        }
    </script>

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
