@extends('admin.layouts.master')



@section('head-tag')
    <title>ویرایش کاربر مشتری</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item"> <a href="#"> بخش کاربران</a></li>
            <li class="breadcrumb-item"> <a href="#"> کاربران مشتری</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ویرایش کاربر مشتری</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش کاربر مشتری
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.customer.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.customer.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام</label>
                                    <input name="first_name" type="text" class="form-control form-control-sm" value="{{ old('first_name', $user->first_name)}}">
                                </div>
                                @error('first_name')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>



                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام خانوادگی</label>
                                    <input name="last_name" type="text" class="form-control form-control-sm" value="{{ old('last_name', $user->last_name)}}">
                                </div>
                                @error('last_name')
                                    <span class="alert_required text-danger p-1">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>




                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">تصویر</label>
                                    <input name="profile_photo_path" type="file" class="form-control form-control-sm"
                                        value="{{ old('profile_photo_path', $user->profile_photo_path)}}">
                                        @if ($user->profile_photo_path !== null)
                                             <img  class="mt-3" src="{{ asset($user->profile_photo_path) }}" alt="profile image" width="100" height="50">
                                        @endif
                                </div>
                                @error('profile_photo_path')
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
