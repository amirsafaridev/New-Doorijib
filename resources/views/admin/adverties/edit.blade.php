@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش آگهی جدید</title>
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
                            href="{{ route('admin.advertise.index') }}">آگهی‌ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش آگهی جدید</li>
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
                        <h4 class="card-title">ویرایش آگهی جدید</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.advertise.update', $advert->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ old('title', $advert->title) }}" placeholder="عنوان" />
                                    @error('title')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="work_houres" class="form-label">ساعت کاری</label>
                                    <input type="text" name="work_houres" class="form-control" id="work_houres"
                                        value="{{ old('work_houres', $advert->work_houres) }}" placeholder="ساعت کاری" />
                                    @error('work_houres')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="benefites" class="form-label">مزایا</label>
                                    <input type="text" name="benefites" class="form-control" id="benefites"
                                        value="{{ old('benefites', $advert->benefites) }}" placeholder="مزایا" />
                                    @error('benefites')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="salary_range" class="form-label">حقوق</label>
                                    <input type="text" name="salary_range" class="form-control" id="salary_range"
                                        value="{{ old('salary_range', $advert->salary_range) }}" placeholder="حقوق" />
                                    @error('salary_range')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12 mt-2">
                                    <label for="category_id">دسته</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category_id', $advert->category_id) == $category->id) selected @endif>
                                                {{ $category->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger rounded p-1" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12 mt-2">
                                    <label for="sex">جنسیت</label>
                                    <select name="sex" id="sex" class="form-control">
                                        <option value="">لطفا جنسیت را انتخاب کنید
                                        </option>
                                        <option value="0" @if (old('sex', $advert->sex) == 0) selected @endif>مرد
                                        </option>
                                        <option value="1" @if (old('sex', $advert->sex) == 1) selected @endif>زن</option>
                                    </select>
                                    @error('sex')
                                        <span class="text-danger rounded p-1" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12 mt-2">
                                    <label for="contract_type">نوع قرارداد</label>
                                    <select name="contract_type" id="contract_type" class="form-control">
                                        <option value="">لطفا نوع قرارداد را انتخاب کنید
                                        </option>
                                        <option value="0" @if (old('contract_type', $advert->contract_type) == 0) selected @endif>تمام وقت
                                        </option>
                                        <option value="1" @if (old('contract_type', $advert->contract_type) == 1) selected @endif>پاره وقت
                                        </option>
                                        <option value="2" @if (old('contract_type', $advert->contract_type) == 2) selected @endif>دور کاری
                                        </option>
                                        <option value="3" @if (old('contract_type', $advert->contract_type) == 3) selected @endif>پروژه‌ای
                                        </option>
                                        <option value="4" @if (old('contract_type', $advert->contract_type) == 4) selected @endif>کارآموزی
                                        </option>
                                    </select>
                                    @error('contract_type')
                                        <span class="text-danger rounded p-1" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12 mt-2">
                                    <label for="contact_type">تماس باما</label>
                                    <select name="contact_type" id="contact_type" class="form-control">
                                        <option value="">لطفا نحوه تماس را انتخاب کنید
                                        </option>
                                        <option value="0" @if (old('contact_type', $advert->contact_type) == 0) selected @endif>پیامک

                                        <option value="1" @if (old('contact_type', $advert->contact_type) == 1) selected @endif> تماس
                                        </option>
                                        </option>
                                    </select>
                                    @error('contact_type')
                                        <span class="text-danger rounded p-1" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="mobile" class="form-label">موبایل</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile"
                                        value="{{ old('mobile', $advert->contact_ways['mobile']) }}"
                                        placeholder="موبایل" />
                                    @error('mobile')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group col-md-6 col-12" id="telegram-section">
                                    <label for="telegram" class="form-label">تلگرام</label>
                                    <input type="text" name="telegram" class="form-control" id="telegram"
                                        value="{{ old('telegram', $advert->contact_ways['telegram']) }}"
                                        placeholder="تلگرام" disabled />
                                    @error('telegram')
                                        <span class="rounded p-1 text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12" id="whatsapp-section">
                                    <label for="whatsapp" class="form-label">واتساپ</label>
                                    <input type="text" name="whatsapp" class="form-control" id="whatsapp"
                                        value="{{ old('whatsapp', $advert->contact_ways['whatsapp']) }}"
                                        placeholder="واتساپ" disabled />
                                    @error('whatsapp')
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
                                        <img id="imgPreview" width="150" height="150" src="#"
                                            alt="image" />
                                    </section>
                                    <section class="col-md-3 mt-3" id="image">
                                        <img src="{{ asset($advert->imageAdvert()->path['indexArray']['medium']) }}"
                                            width="510" height="100" alt="advert-image">
                                    </section>
                                </div>
                                <div class="form-group col-md-6 col-12 mt-2">
                                    <label for="province">استان</label>
                                    <select name="province_id" class="form-control" id="province">
                                        <option selected>استان را انتخاب کنید</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}"
                                                @if (old('province_id', $advert->province_id) == $province->id) selected @endif
                                                data-url="{{ route('customer.sales-process.get-cities', $province->id) }}">
                                                {{ $province->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="city" class="form-label">شهر</label>
                                    <select name="city_id" class="form-control" id="city">
                                        <option selected>شهر را انتخاب کنید</option>

                                        @foreach ($advert->province->cities as $province)
                                            <option value="{{ $province->id }}"
                                                @if (old('city_id', $advert->city_id) == $province->id) selected @endif>
                                                {{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>






                                <div class="form-group col-12 mt-2">
                                    <label for="summernote">توضیحات</label>

                                    <textarea placeholder="توضیحات" name="content" id="summernote" class="form-control form-control-sm"rows="10">{{ old('content', $advert->content) }}</textarea>
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
                if ($('#contact_type').find(':selected').val() == 1) {
                    $('#whatsapp').removeAttr('disabled');
                    $('#telegram').removeAttr('disabled');
                } else {
                    $('#whatsapp-section').fadeOut();
                    $('#telegram-section').fadeOut();
                    $('#whatsapp').attr('disabled', 'disabled');
                    $('#telegram').attr('disabled', 'disabled');
                }
                $('#contact_type').change(function() {
                    if ($('#contact_type').find(':selected').val() == 1) {
                        $('#whatsapp').removeAttr('disabled');
                        $('#telegram').removeAttr('disabled');
                        $('#telegram-section').fadeIn();
                        $('#whatsapp-section').fadeIn();
                    } else {
                        $('#whatsapp').attr('disabled', 'disabled');
                        $('#telegram').attr('disabled', 'disabled');
                        $('#whatsapp-section').fadeOut();
                        $('#telegram-section').fadeOut();
                        $('#whatsapp').val('');
                        $('#telegram').val('');
                    }
                });
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
        <script>
            $(document).ready(function() {
                $('#province').change(function() {
                    var element = $('#province option:selected');
                    var url = element.attr('data-url');
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function(responce) {
                            if (responce.status) {
                                let cities = responce.cities;
                                $('#city').empty();
                                cities.map((city) => {
                                    $('#city').append($('<option/>').val(city.id).text(city
                                        .name));
                                });
                            } else {
                                errorToast('خطا پیش آمده است!!!')
                            }
                        },
                        error: function() {
                            errorToast('خطا پیش آمده است!!!')
                        }
                    });
                });

                // edit province and city
                var addresses = {!! auth()->user()->addresses !!}
                addresses.map((address) => {
                    var id = address.id;
                    var target = `#province`;
                    var selected = `${target} option:selected`;
                    $(target).change(function() {
                        var element = $(selected);
                        var url = element.attr('data-url');
                        $.ajax({
                            url: url,
                            type: "GET",
                            success: function(responce) {
                                if (responce.status) {
                                    let cities = responce.cities;
                                    $(`#city-${id}`).empty();
                                    cities.map((city) => {
                                        $(`#city-${id}`).append($('<option/>').val(
                                            city.id).text(city.name));
                                    })
                                } else {
                                    errorToast('خطا پیش آمده است!!!')
                                }
                            },
                            error: function() {
                                errorToast('خطا پیش آمده است!!!')
                            }
                        });
                    });
                });
            });
        </script>
    @endsection
