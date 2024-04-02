@extends('customer.layouts.master')
@section('head-tag')
    <title>آگهی‌ها</title>
@endsection
@section('content')
    <section class="search-rasult-page">
        <section class="search-ad-sec">
            <div class="search-ad-box">
                <div class="search-ad-title title-home-box">
                    <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.7425 15.5681L15.3094 21.8062C14.8969 22.2056 14.8969 22.7944 15.3094 23.1937L27.7406 35.25C28.5188 36.0019 30 35.5462 30 34.5562V23.8256L21.7425 15.5681Z"
                            fill="#993333" />
                        <path opacity="0.5"
                            d="M30 21.1744V10.4438C30 9.45378 28.5188 8.99816 27.7406 9.75003L23.0888 14.2613L30 21.1744Z"
                            fill="#993333" />
                    </svg>
                    <span class="search-ad-title-text title-home"><span class="color-text">جستجوی</span> آگهی براساس</span>
                </div>
                <form class="search-ad-form" action="{{ route('customer.adverties.search') }}" method="POST">
                    @csrf
                    <input type="text" name="category" id="category" placeholder="دسته شغلی" class="search-ad-input">
                    <input type="text" name="title" id="title" placeholder="عنوان شغلی" class="search-ad-input">
                    <select name="province" id="" placeholder="استان" class="search-ad-input">
                        <option value="" selected>استان</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">
                                {{ $province->name }}</option>
                        @endforeach

                    </select>
                    <select name="contract" id="" placeholder="نوع قرارداد" class="search-ad-input">
                        <option value="" selected>نوع قرارداد</option>
                        <option value="0">تمام وقت</option>
                        <option value="1">پاره وقت</option>
                        <option value="2">دورکاری</option>
                        <option value="3">پروژه‌ای</option>
                        <option value="4">کارآموزی</option>

                    </select>
                    {{-- <select name="sex" id="" placeholder="جنسیت" class="search-ad-input">
                        <option value="" selected>جنسیت</option>
                        <option value="0">زن</option>
                        <option value="1">مرد</option>
                        <option value="2">فرقی ندارد</option>
                    </select> --}}
                    <button type="submit" class="btn search-form-btn">جستجو کنید</button>
                </form>
            </div>
        </section>
        <section class="search-result-box">
            @foreach ($adverties as $advert)
                @php
                    $company = $advert->user->metas()->where('key', 'company')->first();
                @endphp
                <div class="search-result-item">
                    <div class="search-result-company-img">
                        <img src="{{ asset($advert->imageAdvert()->path['indexArray']['medium']) }}"
                            alt="{{ $advert->title }}">
                    </div>
                    <div class="serach-result-text">
                        <span class="search-result-adress">{{ $advert->city->name }} , {{ $advert->province->name }}</span>
                        @if (!empty($company))
                            <h6 class="search-result-company">{{ $company->value['company_name'] }}</h6>
                        @endif
                        <a href="{{ route('customer.advert.show', $advert->id) }}"><h3 class="search-result-ad-title">{{ $advert->title }}</h3></a>
                        <div class="seperator"> </div>
                        <div class="search-result-button-items">
                            <div>
                                <span class="search-rasult-salery">بازه حقوق : {{ $advert->salary_range }} تومان</span>
                                <span class="search-rasult-contract">نوع قرارداد :
                                    {{ $advert->contract_type_value }}</span>
                                <span class="search-rasult-sex">جنسیت : {{ $advert->sex_value }}</span>
                            </div>
                            <div class="search-result-button">
                                @auth
                                    @if ($advert->userBookmark->contains(auth()->user()->id))
                                        <button id="add-to-bookmark" type="button" style="background-color: #993333"
                                            class="search-result-bookmark"
                                            data-url="{{ route('customer.advert.add-to-bookmark', $advert) }}"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از آگهی نشان شده"><img
                                                id="bookmark-image"
                                                src="{{ asset('customer-assets/img/solar_bookmark_outline(w).webp') }}"
                                                alt="{{ $advert->title }}"></button>
                                    @else
                                        <button id="add-to-bookmark" type="button" class="search-result-bookmark"
                                            data-url="{{ route('customer.advert.add-to-bookmark', $advert) }}"
                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="افزودن به آگهی نشان شده"><img id="bookmark-image"
                                                src="{{ asset('customer-assets/img/solar_bookmark_outline.webp') }}"
                                                alt="{{ $advert->title }}"></button>
                                    @endif
                                @endauth
                                @guest
                                    <a href="#" id="add-to-bookmark" type="button" class="search-result-bookmark">
                                        <img src="{{ asset('customer-assets/img/solar_bookmark_outline.webp') }}"
                                            alt="{{ $advert->title }}"></a>
                                @endguest
                                @auth
                                    @if ($advert->resumeUsers->contains(auth()->user()->id))
                                        <button
                                            onclick="window.location.href='{{ route('customer.advert.add-to-resume', $advert->id) }}'"
                                            type="button" class="search-result-sendcv">لقو ارسال رزومه</button>
                                    @else
                                        <button
                                            onclick="window.location.href='{{ route('customer.advert.add-to-resume', $advert->id) }}'"
                                            type="button" class="search-result-sendcv">ارسال رزومه</button>
                                    @endif
                                @endauth
                                @guest
                                    <button
                                        onclick="window.location.href='{{ route('customer.advert.add-to-resume', $advert->id) }}'"
                                        type="button" class="search-result-sendcv">ارسال رزومه</button>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </section>
    </section>
@endsection
@section('scripts')
    <script>
        $('#add-to-bookmark').click(function() {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function(result) {
                    if (result.status == 1) {
                        $(element).attr('style', 'background-color: #993333;');
                        $("#bookmark-image").attr('src',
                            "{{ asset('customer-assets/img/solar_bookmark_outline(w).webp') }}");
                    } else if (result.status == 2) {
                        $(element).attr('style', 'background-color: #FAF5F5;');
                        $("#bookmark-image").attr('src',
                            "{{ asset('customer-assets/img/solar_bookmark_outline.webp') }}");
                    }

                }
            });
        });
    </script>
@endsection
