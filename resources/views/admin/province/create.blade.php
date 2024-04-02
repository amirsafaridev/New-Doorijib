@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد استان</title>
@endsection
@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">بخش تنظیمات</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ایجاد استان</li>
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
                        <h4 class="card-title">ایجاداستان</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.province.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="name" class="form-label">نام استان</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ old('name') }}" placeholder="نام استان" />
                                    @error('name')
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
