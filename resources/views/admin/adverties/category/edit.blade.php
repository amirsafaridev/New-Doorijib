@extends('admin.layouts.master')
@section('head-tag')
    <title>وبرایش دسته بندی</title>
@endsection
@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">بخش آگهی</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.advertise-category.index') }}">آگهی‌ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">وبرایش دسته بندی</li>
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
                        <h4 class="card-title">وبرایش دسته بندی</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.advertise-category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="form-label">نام دسته</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ old('name', $category->value) }}" placeholder="نام دسته ">
                                    @error('name')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-12 mt-2">
                                    <label for="parent_id">منو والد</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option value="">منو اصلی</option>
                                        @foreach ($categories as $category)
                                            @if ($category->id != $category->parent_id)
                                                <option value="{{ $category->id }}"
                                                    @if (old('parent_id', $category->parent_id) == $category->id) selected @endif>
                                                    {{ $category->value }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <span class="text-danger rounded p-1" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-12 mt-2">
                                    <label for="summernote">توضیحات</label>

                                    <textarea name="content" id="summernote" class="form-control form-control-sm"rows="10">{{ old('content', $category->content) }}</textarea>
                                    @error('content')
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
            });
        </script>
    @endsection
