@extends('customer.layouts.master-two-col')


@section('head-tag')
    <title> سفارشات شما</title>
@endsection



@section('content')
    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">


               <!-- aside include -->
               @include('customer.layouts.partials.profile-sidebar')




                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>لیست علاقه های من</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="cart-item d-flex py-3">
                            <section class="cart-img align-self-start flex-shrink-1"><img src="assets/images/products/16.jpg" alt=""></section>
                            <section class="align-self-start w-100">
                                <p class="fw-bold">گوشی موبایل سامسونگ مدل Galaxy A12 SM-A125F/DS دو ...</p>
                                <p><span style="background-color: #CCCCCC;" class="cart-product-selected-color me-1"></span> <span> توسی روشن</span></p>
                                <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                <section>
                                    <a class="text-decoration-none cart-delete" href="#"><i class="fa fa-trash-alt"></i> حذف از لیست علاقه ها</a>
                                </section>
                            </section>
                            <section class="align-self-end flex-shrink-1">
                                <section class="text-nowrap fw-bold">3,799,000 تومان</section>
                            </section>
                        </section>


                        <section class="cart-item d-flex py-3">
                            <section class="cart-img align-self-start flex-shrink-1"><img src="assets/images/products/18.jpg" alt=""></section>
                            <section class="align-self-start w-100">
                                <p class="fw-bold">کیف رودوشی چرم جانتا مدل D078</p>
                                <p><span style="background-color: #FFFF00;" class="cart-product-selected-color me-1"></span> <span> زرد</span></p>
                                <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                <section>
                                    <a class="text-decoration-none cart-delete" href="#"><i class="fa fa-trash-alt"></i> حذف از لیست علاقه ها</a>
                                </section>
                            </section>
                            <section class="align-self-end flex-shrink-1">
                                <section class="cart-item-discount text-danger text-nowrap mb-1">تخفیف 313,000</section>
                                <section class="text-nowrap fw-bold">432,000 تومان</section>
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
        //js
    </script>
@endsection
