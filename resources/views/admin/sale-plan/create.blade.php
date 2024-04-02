@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد پلن‌ اشتراک</title>
@endsection
@section('content')
        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">بخش پلن‌های اشتراک</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">صفحه اصلی</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.admin-users.index') }}">کاربران ادمین</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ایجاد پلن‌ اشتراک </li>
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
                            <h4 class="card-title">ایجاد پلن‌ اشتراک</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sales-plan.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="title" class="form-label">عنوان</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                        value="{{ old('title') }}"   placeholder="عنوان" />
                                        @error('title')
                                            <span class="rounded p-1 text-danger" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label for="price" class="form-label">قیمت</label>
                                            <input type="text" name="price" class="form-control" id="price"
                                            value="{{ old('price') }}"   placeholder="قیمت" />
                                            @error('price')
                                            <span class="rounded p-1 text-danger" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                        </div>


                                    <div class="form-group col-12 mt-2">
                                        <label for="summernote">توضیحات</label>

                                        <textarea placeholder="توضیحات" name="description" id="summernote" class="form-control form-control-sm"rows="10">{{ old('description') }}</textarea>
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
