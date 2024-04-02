@extends('customer.account-layouts.master')
@section('head-tag')
    <title>مدیریت آگهی</title>
@endsection
@section('content')
<section class="employer-panel-page">
    <div class="employer-manage-p1-title-des">
        <div class="employer-manage-p1-title">
            <span>مدیریت آگهی</span>
        </div>
        <div class="employer-manage-p1-help">
            <span class="dot-publish-ad">آگهی منتشر شده</span>
            <span class="dot-waitting-ad">آگهی در انتظار تایید</span>
            <span class="dot-expire-ad">آگهی رد شده</span>
        </div>
    </div>
    <div class="employer-manage-p1-ad-box">
        @foreach ($adverties as $advert)
        <div class="employer-manage-p1-ad-item">
            <h4 class="employer-manage-p1-ad-title">{{ $advert->title }}</h4>
            <span class="employer-manage-p1-ad-time">{{ jalaliDate($advert->create_at,'%B %d، %Y') }}</span>
            <span class="employer-manage-p1-ad-cvnum"><b style="color: #993333;">{{ $advert->resumeUsers()->count() }}</b>رزومه دریافت شد </span>
            <button onclick="window.location.href='{{ route('customer.account.resume-management', $advert->id) }}'" class="employer-manage-p1-ad-cvbtn">رزومه های دریافتی</button>
            <button onclick="window.location.href='{{ route('customer.adverties.edit', $advert->id) }}'" class="employer-manage-p1-ad-editbtn">ویرایش آگهی</button>
        </div>
        @endforeach
        {{-- <div class="pagination">
            {{ $adverties->links("pagination::bootstrap-4") }}
            <a href="#?" class="pagination-num pagination-active">1</a>
            <a href="#?" class="pagination-num">2</a>
            <a href="#?" class="pagination-num">3</a>
        </div> --}}


    </div>
</section>
@endsection
