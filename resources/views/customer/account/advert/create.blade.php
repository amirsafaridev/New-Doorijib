@extends('customer.account-layouts.master')
@section('head-tag')
    <title>
        ایجاد آگهی</title>
@endsection
@section('content')
    <section class="employer-panel-page">
        <div class="page-title-des">
            <span>درج آگهی جدید</span>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
        </div>
        <div>
            <section class="employer-ad-new-plan">

                @foreach ($sales_plan as $plan)
                    <div class="employer-ad-new-plan-item">
                        <div class="employer-ad-new-plan-sec-right">
                            <div class="employer-ad-new-plan-img">
                                <img src="{{ asset('customer-assets/img/group_13.webp') }}" alt="{{ $plan->title }}">
                            </div>
                            <div class="employer-ad-new-plan-title-des">
                                <span>{{ $plan->title }}</span>
                                <p>{{ $plan->description }}</p>
                            </div>
                        </div>
                        <div class="employer-ad-new-plan-sec-left">
                            <span>{{ priceFormat($plan->price) }} تومان</span>
                            <input type="radio" name="employer-plan" id="">
                        </div>
                    </div>
                @endforeach
            </section>

            @if (!empty($company))
                <section class="employer-ad-new-company">
                    <div class="employer-ad-new-company-img">
                        @if (empty($company->value['image']))
                            <img src="{{ asset('admin-assets/images/user-profile.png') }}" alt="user-profile">
                        @else
                            <img src="{{ asset($company->value['image']['indexArray']['medium']) }}" alt="company-profile">
                        @endif
                    </div>
                    <div>
                        <p class="employer-ad-new-company-name">{{ $company->value['company_name'] }}</p>
                        <p class="employer-ad-new-company-des">موضوع فعالیت: {{ $company->value['subject'] }}</p>
                        <p class="employer-ad-new-company-des">تلفن: {{ $company->value['phone_number'] }}</p>
                        <p class="employer-ad-new-company-des">وبسایت:{{ $company->value['site_name'] }}</p>
                    </div>
                    <div>
                        <a href="{{ route('customer.account.company-profile') }}">
                            <p class="employer-ad-new-company-edit">ویرایش اطلاعات</p>
                        </a>
                        <p class="employer-ad-new-company-des">آدرس: {{ $company->value['address'] }}</p>
                        <p class="employer-ad-new-company-des">شماره تماس مجموعه: {{ $company->value['telephone_number'] }}
                        </p>
                        <p class="employer-ad-new-company-des">کد پستی: {{ $company->value['postal_code'] }}</p>
                        <a href="{{ route('customer.account.company-profile') }}">
                            <p class="employer-ad-new-company-edit-mob">ویرایش اطلاعات</p>
                        </a>
                    </div>
                </section>
            @endif
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <section class="employer-ad-new-form">
                <form action="{{ route('customer.adverties.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="عنوان شغل">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">دسته را انتخاب کنید</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                {{ $category->value }}
                            </option>
                        @endforeach
                    </select>
                    <select name="sex" id="sex" class="form-control">
                        <option value="">لطفا جنسیت را انتخاب کنید
                        </option>
                        <option value="0" @if (old('sex') == 0) selected @endif>مرد
                        </option>
                        <option value="1" @if (old('sex') == 1) selected @endif>زن</option>
                        <option value="2" @if (old('sex') == 2) selected @endif>فرقی ندارد</option>

                    </select>
                    <input type="text" name="work_houres" value="{{ old('work_houres') }}" placeholder="ساعات کاری">

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

                    <input type="text" name="benefites" value="{{ old('benefites') }}" placeholder="مزایا">
                    <select name="contract_type">
                        <option value="" disabled selected>نوع قرارداد</option>
                        <option value="0" @if (old('contract_type') == 0) selected @endif>تمام وقت
                        </option>
                        <option value="1" @if (old('contract_type') == 1) selected @endif>پاره وقت
                        </option>
                        <option value="2" @if (old('contract_type') == 2) selected @endif>دور کاری
                        </option>
                        <option value="3" @if (old('contract_type') == 3) selected @endif>پروژه‌ای
                        </option>
                        <option value="4" @if (old('contract_type') == 4) selected @endif>کارآموزی
                        </option>
                    </select>
                    <input type="text" name="salary_range" value="{{ old('salary_range') }}" placeholder="بازه حقوق">
                    {{-- <input type="text" name="" id="" placeholder="شیوه ارتباط با کارفرما"> --}}
                    <select name="contact_type" id="contact_type">
                        <option value="0" @if (old('contact_type') == 0) selected @endif>پیامک
                        </option>
                        <option value="1" @if (old('contact_type') == 1) selected @endif>تماس
                        </option>

                    </select>
                    <div style="display: none" id="telegram-section">
                        <input type="text" name="telegram" id="telegram" value="{{ old('telegram') }}"
                            placeholder="تلگرام" disabled />
                    </div>
                    <div style="display: none" id="whatsapp-section">
                        <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp') }}"
                            placeholder="واتساپ" disabled />
                    </div>
                    <input type="file" name="image" value="{{ old('image') }}" id="image"
                        style="display: none;" />
                    <label for="image" class="upload-logo"><img
                            src="{{ asset('customer-assets/img/group_283.webp') }}" alt="image" />
                        <div style="margin-bottom: 3px;margin-top: 3px;display:none" id="image-preview-container">
                            <img id="imgPreview" width="150" height="150" src="#" alt="image" />
                        </div>
                    </label>
                    <textarea name="content" cols="30" rows="10" placeholder="توضیحات شغل">{{ old('content') }}</textarea>
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
