@extends('customer.account-layouts.master')
@section('head-tag')
    <title>آگهی های نشان شده</title>
@endsection
@section('content')
    <section class="job-seeker-panel-page">
        <div class="page-title-des">
            <span>آگهی های نشان شده</span>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
        </div>
        <div class="job-seeker-bookmark-box">
            @foreach ($adverties as $advert)
                <div class="job-seeker-bookmark-item">
                    <div class="bookmark-img">
                        <img src="{{ asset($advert->imageAdvert()->path['indexArray']['medium']) }}" alt="{{ $advert->title }}">
                    </div>
                    <div class="bookmark-content">
                        <span class="bookmark-content-address">{{ $advert->city->name }} ,
                            {{ $advert->province->name }}</span>
                        @if ($advert->status == 1)
                            <span class="bookmark-content-status-ad bookmark-content-active-ad">فعال</span>
                        @else
                            <span class="bookmark-content-status-ad bookmark-content-deactive-ad">غیر فعال</span>
                        @endif
                        <h6 class="bookmark-content-company-name">هلدینگ بان</h6>
                        <a href="{{ route('customer.advert.show',$advert->id) }}"><h3 class="bookmark-content-title">{{ $advert->title }}</h3></a>
                    </div>
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
