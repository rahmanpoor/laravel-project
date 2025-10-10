  <aside id="sidebar" class="sidebar col-md-3">


                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <form id="filterForm" action="{{ route('customer.products', ['category' => request()->category ?  request()->category->id : null ]) }}" method="GET">
                            <input type="hidden" name="sort" value="{{ request()->sort }}">
                            <!-- start sidebar nav-->
                            <section class="sidebar-nav">
                                <section class="sidebar-nav-item">
                                    @include('customer.layouts.partials.categories', [
                                        'categories' => $categories,
                                    ])
                                </section>

                            </section>
                            <!--end sidebar nav-->
                    </section>

                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    جستجو در نتایج
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section class="">
                            <input class="sidebar-input-text" type="text" name="search" value="{{ request()->search }}"
                                placeholder="جستجو بر اساس نام، برند ...">
                        </section>
                    </section>

                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    برند
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section class="sidebar-brand-wrapper">




                            @foreach ($brands as $brand)
                                <section class="form-check sidebar-brand-item">
                                    <input class="form-check-input" type="checkbox" name="brands[]"
                                        value="{{ $brand->id }}" id="{{ $brand->id }}"
                                        @if (request()->brands && in_array($brand->id, request()->brands)) checked @endif>
                                    <label class="form-check-label d-flex justify-content-between"
                                        for="{{ $brand->id }}">
                                        <span>{{ $brand->persian_name }}</span>
                                        <span>{{ $brand->original_name }}</span>
                                    </label>
                                </section>
                            @endforeach





                        </section>
                    </section>



                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    محدوده قیمت
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <section class="sidebar-price-range d-flex justify-content-between">
                            <section class="p-1"><input type="text" name="min_price"
                                    value="{{ priceFormat(request()->min_price) }}" placeholder="قیمت از...(تومان)"
                                    oninput="formatNumber(this)"></section>
                            <section class="p-1"><input type="text" name="max_price"
                                    value="{{ priceFormat(request()->max_price) }}" placeholder="قیمت تا...(تومان)"
                                    oninput="formatNumber(this)"></section>
                        </section>
                    </section>



                    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                        <section class="sidebar-filter-btn d-grid gap-2">
                            <button class="btn btn-danger" type="submit">اعمال فیلتر</button>
                            <a href="{{ route('customer.products') }}" class="btn btn-outline-danger">حذف فیلتر</a>
                        </section>
                    </section>
                    </form>

                </aside>
