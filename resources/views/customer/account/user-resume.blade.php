@extends('customer.account-layouts.master')
@section('head-tag')
    <title>آگهی های نشان شده</title>
@endsection
@section('content')
    <section class="job-seeker-panel-page">
        <div class="page-title-des">
            <span>رزومه های ارسال شده</span>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
        </div>
        <div class="job-seeker-send-cv-box">
            @foreach ($adverties as $advert)
            <div class="job-seeker-send-cv-item">
                <h4 class="job-seeker-send-cv-item-title">{{ $advert->title }}</h4>

                <span class="job-seeker-send-cv-item-company-name">هلدینگ بان</span>
                @if ($advert->status == 0)
                <span class="job-seeker-send-cv-item-status job-seeker-send-cv-item-checking">در حال بررسی</span>
                @elseif ($advert->status == 1)

                <span class="job-seeker-send-cv-item-status job-seeker-send-cv-item-accept">تایید برای مصاحبه</span>
                @elseif ($advert->status == 2)

                <span class="job-seeker-send-cv-item-status job-seeker-send-cv-item-fail">تلاش برای سایر فرصت ها</span>

                @endif
            </div>
            @endforeach
        </div>
        <div class="job-seeker-bookmark-blog-box">
            <div class="page-title-des">
                <span>مطالب آموزشی</span>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
            </div>
            <div class="panel-blog">
                <div class="job-seeker-blog-item">
                    <img src="{{ asset('customer-assets/img/rectangle_blog.webp')}}" alt="">
                    <h4 class="panel-blog-title">عنوان موردنظر شما در اینجا قرار میگیرد</h4>
                    <span class="panel-blog-time">25 مهر 1402</span>
                </div>
                <div class="job-seeker-blog-item">
                    <img src="{{ asset('customer-assets/img/rectangle_blog.webp')}}" alt="">
                    <h4 class="panel-blog-title">عنوان موردنظر شما در اینجا قرار میگیرد</h4>
                    <span class="panel-blog-time">25 مهر 1402</span>
                </div>
                <div class="job-seeker-blog-item">
                    <img src="{{ asset('customer-assets/img/rectangle_blog.webp')}}" alt="">
                    <h4 class="panel-blog-title">عنوان موردنظر شما در اینجا قرار میگیرد</h4>
                    <span class="panel-blog-time">25 مهر 1402</span>
                </div>
                <div class="job-seeker-blog-item">
                    <img src="{{ asset('customer-assets/img/rectangle_blog.webp')}}" alt="">
                    <h4 class="panel-blog-title">عنوان موردنظر شما در اینجا قرار میگیرد</h4>
                    <span class="panel-blog-time">25 مهر 1402</span>
                </div>
            </div>
        </div>
    </section>
@endsection
