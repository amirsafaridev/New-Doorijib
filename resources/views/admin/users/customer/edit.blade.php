@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش کاربر مشتری</title>
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
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.users.customer-users.index') }}">کاربران مشتری</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش کاربر مشتری</li>

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
                        <h4 class="card-title">ویرایش کاربر مشتری</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.customer-users.update', $customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="user_name" class="form-label">نام کاربری</label>
                                    <input type="text" name="user_name" class="form-control" id="user_name"
                                        value="{{ old('user_name', $customer->user_name) }}" placeholder="نام کاربری " />
                                        @error('user_name')
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
                                        value="{{ old('first_name', $customer->first_name) }}" placeholder="نام" />
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
                                        value="{{ old('last_name', $customer->last_name) }}" placeholder="نام خانوادگی" />
                                    @error('last_name')
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
                                        value="{{ old('mobile', $customer->mobile) }}" placeholder="موبایل" />
                                    @error('mobile')
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
