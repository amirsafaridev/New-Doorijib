@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد کاربر ادمین</title>
@endsection
@section('content')
        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">بخش کاربری</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">صفحه اصلی</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.admin-users.index') }}">کاربران ادمین</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ایجاد کاربر ادمین</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->
            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-xl-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ایجاد کاربر ادمین</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.admin-users.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="user_name" class="form-label">نام کاربری</label>
                                        <input type="text" name="user_name" class="form-control" id="user_name"
                                        value="{{ old('user_name') }}"   placeholder="نام کاربری " />
                                        @error('user_name')
                                            <span class="rounded p-1 text-danger" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label for="mobile" class="form-label">موبایل</label>
                                            <input type="text" name="mobile" class="form-control" id="mobile"
                                            value="{{ old('mobile') }}"   placeholder="موبایل" />
                                            @error('mobile')
                                            <span class="rounded p-1 text-danger" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                        </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="first_name" class="form-label">نام</label>
                                        <input type="text" name="first_name" class="form-control" id="first_name"
                                        value="{{ old('first_name') }}" placeholder="نام" />
                                        @error('first_name')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="last_name" class="form-label">نام‌خانوادگی</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name"
                                        value="{{ old('last_name') }}"   placeholder="نام خانوادگی" />
                                        @error('last_name')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                    </div>


                                    <div class="form-group col-md-6 col-12">
                                        <label for="password" class="form-label">رمز عبور</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                               placeholder="رمز عبور" autocomplete="new-password" />
                                               @error('password')
                                            <span class="rounded p-1 text-danger" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>

                                        <div class="form-group mt-2 col-md-6 col-12">
                                            <label for="password_confirmation">تکرار رمز عبور</label>
                                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="رمز عبور را تکرار کنید"
                                                value="{{ old('password_confirmation') }}" />
                                                @error('password_confirmation')
                                            <span class="rounded p-1 text-danger" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                        </div>

                                </div>
                                <button class="btn btn-success mt-4 mb-0">ثبت</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <!-- CONTAINER END -->




@endsection
