@extends('admin.layouts.master')



@section('head-tag')
    <title>دسترسی های نقش</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item"> <a href="#"> بخش کاربران</a></li>
            <li class="breadcrumb-item"> <a href="#"> نقش ها</a></li>
            <li class="breadcrumb-item active" aria-current="page"> دسترسی های نقش</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        دسترسی های نقش
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3  pb-2">
                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.role.permission-update', $role->id) }}" method="post">
                        @method('put')
                        @csrf
                        <section class="row">



                            <section class="col-12">
                                <section class="row border-top  mt-3 py-3">




                                    <section class="col-12 col-md-5">

                                        <div class="form-group"></div>

                                        <label for="">نام نقش</label>

                                        <section class="text-success"><b>{{ $role->name }}</b></section>

                                    </section>



                                    <section class="col-12 col-md-5">

                                        <div class="form-group"></div>

                                        <label for="">توضیحات نقش</label>

                                        <section class="text-success"><b>{{ $role->description }}</b></section>

                                    </section>






                                    @php
                                        $rolePermissionsArray = $role->permissions->pluck('id')->toArray();
                                    @endphp

                                    @foreach ($permissions as $key => $permission)
                                        <section class="col-md-3">
                                            <div class="mt-5">

                                                <label class="apple-switch">
                                                    <input name="permissions[]" id="{{ $permission->id }}"
                                                        value="{{ $permission->id }}" type="checkbox"
                                                        @if (in_array($permission->id, $rolePermissionsArray)) checked @endif />
                                                    <span class="apple-slider"></span>
                                                </label>

                                                <label for="{{ $permission->id }}"
                                                    class="form-check-label">{{ $permission->name }}</label>
                                            </div>
                                            <div class="mt-2">
                                                @error('permissions' . $key)
                                                    <span class="alert_required text-danger p-1">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </section>
                                    @endforeach


                                    <section class="col-12 col-md-2">
                                        <button class="btn btn-primary btn-sm mt-md-5">ثبت</button>
                                    </section>


                                </section>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
