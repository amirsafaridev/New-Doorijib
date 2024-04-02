@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد تنظیمات سایت</title>
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
                    <li class="breadcrumb-item active" aria-current="page">ایجاد تنظیمات سایت</li>
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
                        <h4 class="card-title">ایجاد تنظیمات سایت</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.setting.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label for="telegram" class="form-label">تلگرام</label>
                                    <input type="text" name="telegram" class="form-control" id="telegram"
                                    value="{{ old('telegram') }}"   placeholder="تلگرام" />
                                    @error('telegram')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label for="instagram" class="form-label">اینستاکرام</label>
                                    <input type="text" name="instagram" class="form-control" id="instagram"
                                    value="{{ old('instagram') }}"   placeholder="اینستاکرام" />
                                    @error('telegram')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label for="linkedin" class="form-label">لینکدین</label>
                                    <input type="text" name="linkedin" class="form-control" id="linkedin"
                                    value="{{ old('linkedin') }}"   placeholder="لینکدین" />
                                    @error('linkedin')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12 mt-2">
                                    <label for="category_id_1">دسته اول</label>
                                    <select name="category_id_1" id="category_id_1" class="form-control">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category_id_1') == $category->id) selected @endif>
                                                {{ $category->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id_1')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12 mt-2">
                                    <label for="category_id_2">دسته دوم</label>
                                    <select name="category_id_2" id="category_id_2" class="form-control">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category_id_2') == $category->id) selected @endif>
                                                {{ $category->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id_2')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12 mt-2">
                                    <label for="category_id">دسته سوم</label>
                                    <select name="category_id_3" id="category_id" class="form-control">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category_id_3') == $category->id) selected @endif>
                                                {{ $category->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id_3')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group col-12 mt-2">
                                    <label for="summernote">توضیحات</label>

                                    <textarea name="description" id="summernote" class="form-control form-control-sm"rows="10">{{ old('description') }}</textarea>
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
            });
        </script>
    @endsection
