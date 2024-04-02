@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش نماد اقتصادی جدید</title>
@endsection
@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">بخش نماد اقتصادی</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.economic-symbol.index') }}">نمادهای اقتصادی‌</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش نماد اقتصادی جدید</li>
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
                        <h4 class="card-title">ویرایش نماد اقتصادی جدید</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.economic-symbol.update', $economicSymbol->id) }}"
                            enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ old('title', $economicSymbol->value['title']) }}" placeholder="عنوان" />
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
                                        value="{{ old('link', $economicSymbol->value['link']) }}" placeholder="لینک" />
                                    @error('link')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class=" form-group col-md-6 col-12 mt-2">
                                    <label for="">تصویر</label>
                                    <input name="image" type="file" id="photo" class="form-control"
                                        value="{{ old('image') }}">
                                    @error('image')
                                        <span class="text-danger rounded p-1" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                    <section class="holder mt-3 d-none" id="image-preview-container">
                                        <img id="imgPreview" width="150" height="150" src="#" alt="image" />
                                    </section>
                                    <section class="col-md-3 mt-3" id="image">
                                        <img src="{{ asset($economicSymbol->imageOption()->path) }}" width="110"
                                            height="119" alt="advert-image">
                                    </section>
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
        <script>
            $(document).ready(function() {
            $('#photo').change(function() {
                $('#image').addClass('d-none');
                $('#image-preview-container').removeClass('d-none');
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
            });
        </script>
    @endsection
