@extends('customer.account-layouts.master')
@section('head-tag')
    <title>داشبورد</title>
@endsection
@section('content')
    <section class="job-seeker-panel-page">
        <div class="panel-notif panel-notif-warning">
            <p>20% از مشخصات کامل شده است برای ثبت آگهی لطفا مشخصات فردی را کامل کنید</p>
        </div>
        <div class="panel-notif panel-notif-success">
            <p>20% از مشخصات کامل شده است برای ثبت آگهی لطفا مشخصات فردی را کامل کنید</p>
        </div>
        <div class="panel-notif panel-notif-error">
            <p>20% از مشخصات کامل شده است برای ثبت آگهی لطفا مشخصات فردی را کامل کنید</p>
        </div>
        <div class="page-title-des">
            <span>{{ auth()->user()->full_name }} عزیز خوش آمدید !</span>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
        </div>
        <div>
            <div class="job-seeker-dashboard-sec1">
                <div class="job-seeker-dashboard-quick-access">
                    @if (auth()->user()->role == 0)
                        <a href="{{ route('customer.account.user-bookmark') }}"
                            class="job-seeker-dashboard-quick-access-bookmark"><span>آگهی های نشان شده</span></a>

                        <a href="{{ route('customer.account.user-resume') }}"
                            class="job-seeker-dashboard-quick-access-send-cv"><span>رزومه های ارسالی</span></a>
                        <a href="{{ route('customer.account.profile') }}"
                            class="job-seeker-dashboard-quick-profile"><span>مشخصات
                                فردی</span></a>
                    @endif
                    @if (auth()->user()->role == 1 || auth()->user()->role == 2)
                    <a href="" class="employer-dashboard-quick-access-add-new"><span>درج آگهی جدید</span></a>
                    <a href="{{ route("customer.account.advert-management") }}" class="employer-dashboard-quick-access-manage-ad"><span>مدیریت آگهی ها</span>
                    </a>
                    <a href="{{ route('customer.account.company-profile') }}"
                        class="employer-dashboard-quick-access-profile"> <span>پروفایل سازمانی</span></a>
                    @endif
                    <a href="{{ route('customer.account.setting') }}"
                        class="job-seeker-dashboard-quick-access-setting"><span>تنظیمات حساب کاربری</span></a>
                </div>
            </div>
            <div class="job-seeker-dashboard-sec2">
                <div class="employer-dashboard-blog-box">
                    <div class="page-title-des">
                        <span>مطالب آموزشی</span>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
                    </div>
                    <div class="panel-blog">
                        <div class="employer-blog-item">
                            <img src="{{ asset('customer-assets/img/rectangle_blog.webp') }}" alt="">
                            <h4 class="panel-blog-title">عنوان موردنظر شما در اینجا قرار میگیرد</h4>
                            <span class="panel-blog-time">25 مهر 1402</span>
                        </div>
                        <div class="employer-blog-item">
                            <img src="{{ asset('customer-assets/img/rectangle_blog.webp') }}" alt="">
                            <h4 class="panel-blog-title">عنوان موردنظر شما در اینجا قرار میگیرد</h4>
                            <span class="panel-blog-time">25 مهر 1402</span>
                        </div>
                        <div class="employer-blog-item">
                            <img src="{{ asset('customer-assets/img/rectangle_blog.webp') }}" alt="">
                            <h4 class="panel-blog-title">عنوان موردنظر شما در اینجا قرار میگیرد</h4>
                            <span class="panel-blog-time">25 مهر 1402</span>
                        </div>
                    </div>
                </div>
                <div class="employer-dashboard-banner">
                    <img src="{{ asset('customer-assets/img/banner-test.webp') }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
