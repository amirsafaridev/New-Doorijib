@extends('customer.account-layouts.master')
@section('head-tag')
    <title>
        ویرایش آگهی</title>
@endsection
@section('content')
    <section class="employer-panel-page">
        <div class="page-title-des">
            <span>ویرایش آگهی</span>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
        </div>
        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <section class="employer-ad-new-form">
                <form action="{{ route('customer.adverties.update', $advert->id) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" value="{{ old('title', $advert->title) }}" placeholder="عنوان شغل">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">دسته را انتخاب کنید</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('category_id', $category->id) == $category->id) selected @endif>
                                {{ $category->value }}
                            </option>
                        @endforeach
                    </select>
                    <select name="sex" id="sex" class="form-control">
                        <option value="">لطفا جنسیت را انتخاب کنید
                        </option>
                        <option value="0" @if (old('sex', $advert->sex) == 0) selected @endif>مرد
                        </option>
                        <option value="1" @if (old('sex', $advert->sex) == 1) selected @endif>زن</option>
                        <option value="2" @if (old('sex', $advert->sex) == 2) selected @endif>فرقی ندارد</option>

                    </select>
                    <input type="text" name="work_houres" value="{{ old('work_houres', $advert->work_houres) }}"
                        placeholder="ساعات کاری">
                    <select name="province_id" id="province">
                        <option selected>استان را انتخاب کنید</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}"
                                data-url="{{ route('customer.sales-process.get-cities', $province->id) }}">
                                {{ $province->name }}</option>
                        @endforeach

                    </select>
                    <select name="city_id" id="city">
                        <option selected>شهر را انتخاب کنید</option>

                    </select>

                    <input type="text" name="benefites" value="{{ old('benefites', $advert->benefites) }}"
                        placeholder="مزایا">
                    <select name="contract_type">
                        <option value="" disabled selected>نوع قرارداد</option>
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
                    <input type="text" name="salary_range" value="{{ old('salary_range', $advert->salary_range) }}" placeholder="بازه حقوق">
                    {{-- <input type="text" name="" id="" placeholder="شیوه ارتباط با کارفرما"> --}}
                    <select name="contact_type" id="contact_type">
                        <option value="0" @if (old('contact_type', $advert->contact_type) == 0) selected @endif>پیامک
                        </option>
                        <option value="1" @if (old('contact_type', $advert->contact_type) == 1) selected @endif>تماس
                        </option>

                    </select>
                    <div style="display: none" id="telegram-section">
                        <input type="text" name="telegram" id="telegram"
                            value="{{ old('telegram', $advert->contact_ways['telegram']) }}" placeholder="تلگرام"
                            disabled />
                    </div>
                    <div style="display: none" id="whatsapp-section">
                        <input type="text" name="whatsapp" id="whatsapp"
                            value="{{ old('whatsapp', $advert->contact_ways['whatsapp']) }}" placeholder="واتساپ"
                            disabled />
                    </div>
                    <input type="file" name="image" value="{{ old('image', $advert->image) }}" id="image"
                        style="display: none;" />
                    <label for="image" class="upload-logo"><img src="{{ asset('customer-assets/img/group_283.webp') }}"
                            alt="image" />
                        <section style="margin-bottom: 3px;margin-top: 3px;display:none" id="image-preview-container">
                            <img id="imgPreview" width="150" height="150" src="#" alt="image" />
                        </section>
                        <section id="advert-image">
                            <img src="{{ asset($advert->imageAdvert()->path['indexArray']['medium']) }}" width="510" height="100" alt="advert-image">
                        </section>
                    </label>
                    <textarea name="content" cols="30" rows="10" placeholder="توضیحات شغل">{{ old('content', $advert->content) }}</textarea>
                    <button type="submit" class="panel-button">ثبت و پرداخت</button>
                </form>
            </section>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
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
            $('#image').change(function() {
                $('#image-preview-container').attr('style', 'margin-top: 15px');
                $('#advert-image').attr('style', 'display:none');
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
