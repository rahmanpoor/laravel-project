@extends('customer.layouts.master-two-col')

@section('head-tag')
    <title>{{ $page->title }}</title>
@endsection




@section('content')


     <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                      <!-- start product info -->
                        <section class="col-md-12">

                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

 {!! $page->body !!}
                            </section>

                        </section>
                        <!-- end product info -->
                </section>
            </section>
        </section>
    </section>
@endsection

