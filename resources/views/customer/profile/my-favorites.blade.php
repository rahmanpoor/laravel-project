@extends('customer.layouts.master-two-col')


@section('head-tag')
    <title>لیست علاقه های من</title>
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
                                    <span>لیست علاقه های من</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        @forelse (auth()->user()->products as $product)

                        <section class="cart-item d-flex py-3">
                            <section class="cart-img align-self-start flex-shrink-1"><img src="{{ asset($product->image['indexArray']['medium']) }}" alt=""></section>
                            <section class="align-self-start w-100">
                                <p class="fw-bold">{{ $product->name }}</p>
                                <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>{{ $product->marketable_number !=0 ? 'کالا موجود در انبار' : 'ناموجود' }}</span></p>
                                <section>
                                    <a class="text-decoration-none cart-delete text-danger" href="{{ route('customer.profile.my-favorites.delete', $product) }}"><i class="fa fa-trash-alt"></i> حذف از لیست علاقه ها</a>
                                </section>
                            </section>
                            <section class="align-self-end flex-shrink-1">
                                <section class="text-nowrap fw-bold"> {{ priceFormat($product->price) }} تومان</section>
                            </section>
                        </section>

                         @empty



                                <section class="order-item">
                                    <div class="alert alert-info" role="alert">
                                        لیست علاقه های شما خالی است
                                    </div>
                                </section>

                        @endforelse




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
