@extends('admin.layouts.master')



@section('head-tag')
    <title>نمایش تیکت ها</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item"> <a href="#"> بخش تیکت ها</a></li>
            <li class="breadcrumb-item"> <a href="#"> تیکت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page"> نمایش تیکت ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش تیکت ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.ticket.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">
                    <section class="card-header bg-primary text-white">
                        {{ $ticket->user->first_name . ' ' . $ticket->user->last_name }} - {{ $ticket->id }}
                    </section>

                    <section class="card-body">
                        <h5 class="card-title">موضوع: {{ $ticket->subject }}</h5>
                        <p class="card-text"> {{ $ticket->description }} </p>
                    </section>
                </section>

                <section>
                    <form action="{{ route('admin.ticket.answer', $ticket->id) }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">پاسخ تیکت</label>
                                    <textarea class="form-control form-control-sm" rows="4" name="description">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                        </section>
                        <section>
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
