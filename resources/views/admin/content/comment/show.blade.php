@extends('admin.layouts.master')



@section('head-tag')
    <title>نمایش نظر</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item"> <a href="#"> بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#"> نظرات</a></li>
            <li class="breadcrumb-item active" aria-current="page"> نمایش نظر</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش نظر
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">
                    <section class="card-header bg-custom-yellow text-white">
                        {{ $comment->user->FullName }} - {{ $comment->user->id }}
                    </section>

                    <section class="card-body">
                        <h5 class="card-title">مشخصات: {{ $comment->commentable->title }} &nbsp; کد:
                            {{ $comment->commentable->id }}</h5>
                        <p class="card-text">{{ $comment->body }}</p>
                    </section>
                </section>



                @if ($comment->parent_id == null)
                    <section>
                        <form action="{{ route('admin.content.comment.answer', $comment->id) }}" method="POST">
                            @csrf
                            <section class="row">
                                <section class="col-12">
                                    <div class="form-group">
                                        <label for="body">پاسخ ادمین</label>
                                        <textarea name="body" id="body" class="form-control form-control-sm" rows="4">{{ old('body') }}</textarea>
                                    </div>
                                    @error('body')
                                        <span class="alert_required text-danger p-1">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </section>
                            </section>
                            <section>
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </form>
                    </section>
                @endif
            </section>
        </section>
    </section>
@endsection
