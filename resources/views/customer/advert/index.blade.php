@extends('customer.layouts.master')
@section('head-tag')
    <title>{{ $advert->title }}</title>
@endsection
@section('content')
    <section class="single-ad-page">
        <section class="single-ad-sec-1">
            <div class="single-ad-sec-1-right-box">
                <div class="single-ad-ad-title">
                    <h2>{{ $advert->title }}</h2>
                </div>
                <div class="single-ad-company-name">
                    <span>{{ $advert->user->full_name }}</span>
                </div>
            </div>
            <div class="single-ad-sec-1-left-box">
                <span class="publish-ad-time">{{ jalaliDate($advert->created_at) }}</span>
                <span class="single-ad-cat">{{ $advert->category->value }}</span>
                @auth
                    @if ($advert->userBookmark->contains(auth()->user()->id))
                        <img id="add-to-bookmark" style="border-radius: 6px; cursor: pointer;"
                            data-url="{{ route('customer.advert.add-to-bookmark', $advert) }}" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="حذف از آگهی نشان شده"
                            src="{{ asset('customer-assets/img/bookmark.webp') }}" alt="bookmark">
                    @else
                        <img id="add-to-bookmark" style="border-radius: 6px; cursor: pointer;"
                            data-url="{{ route('customer.advert.add-to-bookmark', $advert) }}" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="افزودن به آگهی نشان شده"
                            src="{{ asset('customer-assets/img/save_single_ads.webp') }}" alt="bookmark">
                    @endif
                @endauth
                @guest
                    <img onclick="window.location.href='{{ route('customer.auth.login') }}'" src="{{ asset('customer-assets/img/save_single_ads.webp') }}" alt="bookmark">
                @endguest
                <img style="cursor: pointer" onclick="share()" src="{{ asset('customer-assets/img/share.webp') }}"
                    alt="shared">
            </div>
        </section>
        <section class="single-ad-sec-2">
            <div class="single-ad-sec-2-right-box">
                <div class="single-ad-job-condition-box">
                    <span class="single-ad-page-title">شرایط شغلی</span>
                    <div class="single-ad-job-condition">
                        <span class="single-ad-job-condition-sex">جنسیت: {{ $advert->sex_value }}</span>
                        <span class="single-ad-job-condition-time">ساعت کاری: {{ $advert->work_houres }}</span>
                        <span class="single-ad-job-condition-contract">نوع قرارداد :
                            {{ $advert->contract_type_value }}</span>
                        <span class="single-ad-job-condition-salary">بازه حقوق : {{ $advert->salary_range }}</span>
                        <span class="single-ad-job-condition-contact">راه های ارتباطی : {{ $advert->contact_type_value }}
                        </span>
                        <span class="single-ad-job-condition-benefit">مزایا : {{ $advert->benefites }}</span>
                        <span class="single-ad-job-condition-address">محل کار : {{ $userCompany->value['address'] }}</span>
                    </div>
                </div>
                <div class="single-ad-job-duty-box">
                    <span class="single-ad-page-title">شرح وظایف</span>
                    <p class="job-duty-des">
                        {!! $advert->content !!}</p>
                </div>
                @if (!empty($userCompany))
                    <div class="single-ad-company-intro-box">
                        <span class="single-ad-page-title">معرفی شرکت</span>
                        <div class="single-ad-company-intro">
                            <div>
                                <div class="single-ad-company-intro-sub-box">
                                    @if (empty($userCompany->value['image']))
                                        <img src="{{ asset('admin-assets/images/user-profile.png') }}"
                                            alt="profile-image" />
                                    @else
                                        <img src="{{ asset($userCompany->value['image']['indexArray']['medium']) }}"
                                            alt="profile-image" />
                                    @endif
                                    <span>{{ $userCompany->value['company_name'] }}</span>
                                </div>
                                <p class="company-activity-subject">موضوع فعالیت: {{ $userCompany->value['subject'] }}</p>
                            </div>
                            <div class="sep"> </div>
                            <div class="">
                                <ul>
                                    <li>آدرس: {{ $userCompany->value['address'] }}</li>
                                    <li>شماره تماس مجموعه: {{ $userCompany->value['telephone_number'] }}</li>
                                    <li>تلفن: <a href="tel:09399363636"
                                            rel="nofollow">{{ $userCompany->value['phone_number'] }}</a></li>
                                    <li>وبسایت: <a href="#?" rel="nofollow">{{ $userCompany->value['site_name'] }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="single-ad-sec-2-left-box">
                <div class="single-ad-job-seeker-box">
                    @if (!empty($user->value['image']))
                        <img src="{{ asset($user->value['image']['indexArray']['medium']) }}" alt="user-profile"
                            class="single-ad-job-seeker-img">
                    @else
                        <img src="{{ asset('admin-assets/images/user-profile.png') }}" alt="user-profile"
                            class="single-ad-job-seeker-img">
                    @endif
                    <span class="single-ad-job-seeker-name">{{ $advert->user->fullname }}</span>
                    <span class="single-ad-job-seeker-study-field">{{ $user->value['study'] }}</span>
                    <span class="single-ad-job-seeker-email">{{ $user->value['email'] }}</span>
                    @auth
                        @if ($advert->resumeUsers->contains(auth()->user()->id))
                            <button onclick="window.location.href='{{ route('customer.advert.add-to-resume', $advert->id) }}'"
                                type="button">لغو ارسال رزومه</button>
                        @else
                            <button onclick="window.location.href='{{ route('customer.advert.add-to-resume', $advert->id) }}'"
                                type="button">ارسال رزومه</button>
                        @endif
                    @endauth
                    @guest
                        <button onclick="window.location.href='{{ route('customer.advert.add-to-resume', $advert->id) }}'"
                            type="button">ارسال رزومه</button>
                    @endguest

                </div>
                <div class="single-ad-related-ad-box">
                    <span class="single-ad-page-title">آگهی های مرتبط</span>
                    @foreach ($adverties as $advert)
                        <div class="single-ad-related-ad">
                            <div>
                                <img src="{{ asset($advert->imageAdvert()->path['indexArray']['medium']) }}"
                                    alt="{{ $advert->title }}" class="single-ad-related-company-img">
                            </div>
                            <div>
                                <p class="single-ad-related-address">{{ $advert->city->name }} ,
                                    {{ $advert->province->name }}</p>
                                @if (!empty($userCompany))
                                    <p class="single-ad-related-company">{{ $userCompany->value['company_name'] }}</p>
                                @endif
                                <a href="{{ route('customer.advert.show', $advert->id) }}">
                                    <p class="single-ad-related-job-title">{{ $advert->title }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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
                        $(element).attr('src',
                            "{{ asset('customer-assets/img/bookmark.webp') }}");

                    } else if (result.status == 2) {
                        $(element).attr('src',
                            "{{ asset('customer-assets/img/save_single_ads.webp') }}");
                    }

                }
            });
        });

        function share() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $advert->title }}',
                    text: '{!! $advert->content !!}',
                    url: '{{ route('customer.advert.show', $advert->id) }}',
                })
            } else {
                console.log("سیستم شما از اشتراک گزاری پشتیبانی نمی کند")
            }
        }
    </script>
@endsection
