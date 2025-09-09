@extends('customer.layouts.master-two-col')


@section('head-tag')
    <title>مدیریت آدرس ها</title>
@endsection



@section('content')
    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            @include('admin.alerts.alert-section.success');
            <section class="row">




                <!-- aside include -->
                @include('customer.layouts.partials.profile-sidebar')



                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>آدرس های من</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->





                              <section class="address-select">


                                    @foreach (auth()->user()->addresses as $address)
                                        <input type="radio"  name="address_id" value="{{ $address->id }}"
                                            id="address_id" />
                                        <!--checked="checked"-->
                                        <label for="a-{{ $address->id }}" data-bs-toggle="modal"
                                                data-bs-target="#edit-address-{{ $address->id }}" class="address-wrapper mb-2 p-2">
                                            <section class="mb-2">
                                                <i class="fa fa-map-marker-alt mx-1"></i>
                                                آدرس : {{ $address->city->province->name ?? '-' }}
                                                {{ $address->city->name ?? '-' }} {{ $address->address ?? '-' }}
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa fa-envelope mx-1"></i>
                                                کد پستی : {{ $address->postal_code ?? '-' }}
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa-user-tag mx-1"></i>
                                                گیرنده : {{ $address->recipient_first_name ?? '-' }}
                                                {{ $address->recipient_last_name ?? '-' }}
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa-mobile-alt mx-1"></i>
                                                موبایل گیرنده : {{ $address->mobile ?? '-' }}
                                            </section>
                                            <a class="" ><i
                                                    class="fa fa-edit"></i> ویرایش آدرس</a>
                                        </label>


                                        <!-- start edit address Modal -->
                                        <section class="modal fade" id="edit-address-{{ $address->id }}" tabindex="-1"
                                            aria-labelledby="add-address-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="edit-address-label"><i
                                                                class="fa fa-plus"></i> ویرایش آدرس </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row" method="POST"
                                                            action="{{ route('customer.sales-process.update-address', $address->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <section class="col-6 mb-2">
                                                                <label for="province-{{ $address->id }}"
                                                                    class="form-label mb-1">استان</label>
                                                                <select name="province_id"
                                                                    class="form-select form-select-sm"
                                                                    id="province-{{ $address->id }}">
                                                                    @foreach ($provinces as $province)
                                                                        <option
                                                                            {{ $province->id == $address->city->province_id ? 'selected' : '' }}
                                                                            value="{{ $province->id }}"
                                                                            data-url="{{ route('customer.sales-process.get-cities', $province->id) }}">
                                                                            {{ $province->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="city" class="form-label mb-1">شهر</label>
                                                                <select name="city_id" class="form-select form-select-sm"
                                                                    id="city-{{ $address->id }}">
                                                                    <option selected>شهر را انتخاب کنید</option>
                                                                </select>
                                                            </section>
                                                            <section class="col-12 mb-2">
                                                                <label for="address" class="form-label mb-1">نشانی</label>
                                                                <textarea name="address" autocomplete="off" class="form-control form-control-sm" id="address" placeholder="نشانی">{{ $address->address }}</textarea>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="postal_code" class="form-label mb-1">کد
                                                                    پستی</label>
                                                                <input type="text" autocomplete="off"
                                                                    value="{{ $address->postal_code }}" name="postal_code"
                                                                    class="form-control form-control-sm" id="postal_code"
                                                                    placeholder="کد پستی">
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="no" class="form-label mb-1">پلاک</label>
                                                                <input type="text" autocomplete="off"
                                                                    value="{{ $address->no }}" name="no"
                                                                    class="form-control form-control-sm" id="no"
                                                                    placeholder="پلاک">
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="unit" class="form-label mb-1">واحد</label>
                                                                <input type="text" autocomplete="off"
                                                                    value="{{ $address->unit }}" name="unit"
                                                                    class="form-control form-control-sm" id="unit"
                                                                    placeholder="واحد">
                                                            </section>

                                                            <section class="border-bottom mt-2 mb-3"></section>

                                                            <section class="col-12 mb-2">
                                                                <section class="form-check">

                                                                    <input
                                                                        {{ $address->recipient_first_name !== auth()->user()->first_name || $address->recipient_last_name !== auth()->user()->last_name ? 'checked' : '' }}
                                                                        class="receiver form-check-input" name="receiver"
                                                                        type="checkbox" id="receiver">
                                                                    <label class="form-check-label" for="receiver">
                                                                        گیرنده سفارش خودم نیستم (اطلاعات زیر تکمیل شود)
                                                                    </label>
                                                                </section>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="first_name" class="form-label mb-1">نام
                                                                    گیرنده</label>
                                                                <input type="text" autocomplete="off"
                                                                    value="{{ $address->recipient_first_name }}"
                                                                    name="recipient_first_name"
                                                                    class="form-control form-control-sm" id="first_name"
                                                                    placeholder="نام گیرنده">
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="last_name" class="form-label mb-1">نام
                                                                    خانوادگی گیرنده</label>
                                                                <input
                                                                    value="{{ $address->recipient_last_name ?? $address->recipient_last_name }}"
                                                                    type="text" autocomplete="off"
                                                                    name="recipient_last_name"
                                                                    class="form-control form-control-sm" id="last_name"
                                                                    placeholder="نام خانوادگی گیرنده">
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="mobile" class="form-label mb-1">شماره
                                                                    موبایل</label>
                                                                <input type="text" autocomplete="off"
                                                                    value="{{ $address->mobile ?? $address->mobile }}"
                                                                    name="mobile" class="form-control form-control-sm"
                                                                    id="mobile" placeholder="شماره موبایل">
                                                            </section>



                                                    </section>
                                                    <section class="modal-footer py-1">
                                                        <button type="submit" class="btn btn-sm btn-primary">ثبت
                                                            آدرس</button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            data-bs-dismiss="modal">بستن</button>
                                                    </section>
                                                    </form>
                                                </section>
                                            </section>
                                        </section>
                                        <!-- end edit address Modal -->
                                    @endforeach




                                    <section class="address-add-wrapper">
                                        <button class="address-add-button" type="button" data-bs-toggle="modal"
                                            data-bs-target="#add-address"><i class="fa fa-plus"></i> ایجاد آدرس
                                            جدید</button>




                                        <!-- start add address Modal -->
                                        <section class="modal fade" id="add-address" tabindex="-1"
                                            aria-labelledby="add-address-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-address-label"><i
                                                                class="fa fa-plus"></i> ایجاد آدرس جدید</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row" method="POST"
                                                            action="{{ route('customer.sales-process.add-address') }}">
                                                            @csrf
                                                            <section class="col-6 mb-2">
                                                                <label for="province"
                                                                    class="form-label mb-1">استان</label>
                                                                <select name="province_id"
                                                                    class="form-select form-select-sm" id="province">
                                                                    <option selected>استان را انتخاب کنید</option>
                                                                    @foreach ($provinces as $province)
                                                                        <option value="{{ $province->id }}"
                                                                            data-url="{{ route('customer.sales-process.get-cities', $province->id) }}">
                                                                            {{ $province->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="city" class="form-label mb-1">شهر</label>
                                                                <select name="city_id" class="form-select form-select-sm"
                                                                    id="city">
                                                                    <option selected>شهر را انتخاب کنید</option>
                                                                </select>
                                                            </section>
                                                            <section class="col-12 mb-2">
                                                                <label for="address"
                                                                    class="form-label mb-1">نشانی</label>
                                                                <textarea name="address" autocomplete="off" class="form-control form-control-sm" id="address" placeholder="نشانی"></textarea>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="postal_code" class="form-label mb-1">کد
                                                                    پستی</label>
                                                                <input type="text" autocomplete="off" name="postal_code"
                                                                    class="form-control form-control-sm" id="postal_code"
                                                                    placeholder="کد پستی">
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="no" class="form-label mb-1">پلاک</label>
                                                                <input type="text" name="no"
                                                                    class="form-control form-control-sm" id="no"
                                                                    placeholder="پلاک">
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="unit" class="form-label mb-1">واحد</label>
                                                                <input type="text" name="unit"
                                                                    class="form-control form-control-sm" id="unit"
                                                                    placeholder="واحد">
                                                            </section>

                                                            <section class="border-bottom mt-2 mb-3"></section>

                                                            <section class="col-12 mb-2">
                                                                <section class="form-check">
                                                                    <input class="receiver form-check-input"
                                                                        name="receiver" type="checkbox" id="receiver">
                                                                    <label class="form-check-label" for="receiver">
                                                                        گیرنده سفارش خودم نیستم (اطلاعات زیر تکمیل شود)
                                                                    </label>
                                                                </section>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="first_name"
                                                                    class="field  first_name form-label mb-1">نام
                                                                    گیرنده</label>
                                                                <input type="text" autocomplete="off" name="recipient_first_name"
                                                                    class="form-control form-control-sm" id="first_name"
                                                                    placeholder="نام گیرنده">
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="last_name"
                                                                    class="field  last_name form-label mb-1">نام
                                                                    خانوادگی گیرنده</label>
                                                                <input type="text" name="recipient_last_name"
                                                                    class="form-control form-control-sm" id="last_name"
                                                                    placeholder="نام خانوادگی گیرنده">
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="mobile"
                                                                    class="field  mobile form-label mb-1">شماره
                                                                    موبایل</label>
                                                                <input type="text" name="mobile"
                                                                    class="form-control form-control-sm" id="mobile"
                                                                    placeholder="شماره موبایل">
                                                            </section>



                                                    </section>
                                                    <section class="modal-footer py-1">
                                                        <button type="submit" class="btn btn-sm btn-primary">ثبت
                                                            آدرس</button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            data-bs-dismiss="modal">بستن</button>
                                                    </section>
                                                    </form>
                                                </section>
                                            </section>
                                        </section>
                                        <!-- end add address Modal -->
                                    </section>

                                </section>


                    </section>
                </main>

            </section>
        </section>
    </section>
    <!-- end body -->
@endsection




@section('scripts')
    <script>
        $(document).ready(function() {
            $('#province').change(function() {
                var element = $('#province option:selected');
                var url = element.attr('data-url');

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        if (response.status) {
                            let cities = response.cities;
                            $('#city').empty();
                            cities.map(function(city) {
                                $('#city').append(
                                    `<option value="${city.id}">${city.name}</option>`
                                )
                            })


                        } else {
                            errorToast('مشکلی پیش آمده است');
                        }
                    },
                    error: function() {
                        errorToast('مشکلی پیش آمده است');
                    }
                })
            })

            // edit
            var addresses = {!! auth()->user()->addresses !!};

            addresses.map(function(address) {
                var id = address.id;
                var target = `#province-${id}`;
                var selected = `${target} option:selected`;

                function loadCities(provinceElement, selectedCityId) {
                    var url = provinceElement.attr('data-url');

                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function(response) {
                            if (response.status) {
                                let cities = response.cities;
                                let citySelect = $(`#city-${id}`);
                                citySelect.empty();

                                cities.map(function(city) {
                                    citySelect.append(
                                        `<option value="${city.id}">${city.name}</option>`
                                    );
                                });

                                // انتخاب شهر ذخیره‌شده
                                if (selectedCityId) {
                                    citySelect.val(selectedCityId);
                                }
                            } else {
                                errorToast('مشکلی پیش آمد');
                            }
                        },
                        error: function() {
                            errorToast('مشکلی پیش آمد');
                        }
                    });
                }

                // وقتی کاربر استان رو تغییر میده
                $(target).change(function() {
                    var element = $(this).find("option:selected");
                    loadCities(element, null);
                });

                // بارگذاری اولیه (نمایش شهر کاربر وقتی مدال باز میشه)
                var element = $(selected);
                loadCities(element, address.city_id);
            });
        })
    </script>

    <script>
        $(function() {
            $(".modal").each(function() {
                const modal = $(this);
                const fields = modal.find("#first_name, #last_name, #mobile");
                const receiver = modal.find(".receiver");

                function toggleFields() {
                    const enabled = receiver.is(":checked");
                    fields.prop("disabled", !enabled);
                    if (!enabled) fields.val('');
                }

                // بارگذاری اولیه
                toggleFields();

                // تغییر وضعیت
                receiver.on("change", toggleFields);
            });
        });
    </script>
@endsection
