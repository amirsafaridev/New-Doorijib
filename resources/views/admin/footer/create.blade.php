@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد تنظیمات فوتر</title>
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
                    <li class="breadcrumb-item active" aria-current="page">ایجاد تنظیمات فوتر</li>
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
                        <h4 class="card-title">ایجاد تنظیمات فوتر</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.footer.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ old('title') }}" placeholder="عنوان" />
                                    @error('title')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="link" class="form-label">لینک</label>
                                    <input type="text" name="link" class="form-control" id="link"
                                        value="{{ old('link') }}" placeholder="لینک" />
                                    @error('link')
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


