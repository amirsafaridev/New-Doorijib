@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد بنر اصلی</title>
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
                    <li class="breadcrumb-item active" aria-current="page">ایجاد بنر اصلی</li>
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
                        <h4 class="card-title">ایجاد بتر اصلی</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.hero.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="summernote" class="form-label">عنوان </label>
                                    <textarea name="title" id="summernote" class="form-control form-control-sm"rows="10">{{ old('title') }}</textarea>
                                    @error('title')
                                        <span class="text-danger rounded p-1" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="subtitle" class="form-label">زیر عنوان </label>
                                    <input type="text" name="subtitle" class="form-control" id="subtitle"
                                        value="{{ old('subtitle') }}" placeholder="زیر عنوان">
                                    @error('subtitle')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group col-12 mt-2">
                                    <label for="summernote2">توضیحات</label>

                                    <textarea name="description" id="summernote2" class="form-control form-control-sm"rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger rounded p-1" role="alert">
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

    @section('scripts')
        <script src="{{ asset('admin-assets/plugins/summernote/summernote1.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/summernote/summernote-fa-IR.js') }}"></script>
        <script src="{{ asset('admin-assets/js/summernote.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
                $('#summernote2').summernote();

            });
        </script>
    @endsection
