@extends('customer.layouts.master')
@section('head-tag')
    <title>خانه</title>
@endsection
@section('content')
    <section>
        <section class="hero-sec">
            <div class="hero-sec-1">
                <div class="hero-text">
                    {{-- <h2 class="hero-title">دوری <span class="color-text">جاب</span> چیست؟</h2> --}}
                    <h2 class="hero-title">{!! $hero->value['title'] !!}</h2>

                    <span class="hero-title-en">{{ $hero->value['subtitle'] }}</span>
                    <span class="hero-des">{!! $hero->value['description'] !!}</span>
                </div>
                <div class="logo-slider multiple-items">
                    <div><img src="{{ asset('customer-assets/img/tapsi.webp') }}" alt="company"></div>
                    <div> <img src="{{ asset('customer-assets/img/bun.webp') }}" alt="company"></div>
                    <div><img src="{{ asset('customer-assets/img/company.webp') }}" alt="company"></div>
                    <div><img src="{{ asset('customer-assets/img/company2.webp') }}" alt="company"></div>
                    <div><img src="{{ asset('customer-assets/img/group_33.webp') }}" alt="company"></div>
                </div>

            </div>
            <div class="hero-sec-1">
                <img src="{{ asset('customer-assets/img/hreo-sec.webp') }}" alt="hero section image">
            </div>
        </section>
        <section class="search-ad-sec">
            <div class="search-ad-box">
                <div class="search-ad-title title-home-box">
                    <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
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
                    <input type="text" name="title" placeholder="عنوان شغلی" class="search-ad-input">
                    <select name="province" placeholder="استان" class="search-ad-input">
                        <option value="" selected>استان</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">
                                {{ $province->name }}</option>
                        @endforeach

                    </select>
                    <select name="contract" placeholder="نوع قرارداد" class="search-ad-input">
                        <option value="" selected>نوع قرارداد</option>
                        <option value="0">تمام وقت</option>
                        <option value="1">پاره وقت</option>
                        <option value="2">دورکاری</option>
                        <option value="3">پروژه‌ای</option>
                        <option value="4">کارآموزی</option>
                    </select>
                    <select name="sex" placeholder="جنسیت" class="search-ad-input">
                        <option value="" selected>جنسیت</option>
                        <option value="0">زن</option>
                        <option value="1">مرد</option>
                        <option value="2">فرقی ندارد</option>
                    </select>
                    <button type="submit" class="btn search-form-btn">جستجو کنید</button>
                </form>
            </div>
        </section>
        <section class="latest-ad">
            <div class="latest-ad-title title-home-box">
                <span class="latest-ad-title-text title-home"><span class="color-text">جستجوی</span> آگهی براساس</span>
            </div>
            <div class="ad-cat">
                @foreach ($categories as $category)
                @if ($category->adverties()->count() > 0)
                    <div class="ad-cat-box">
                        <div class="ad-cat-header">
                            <span class="ad-cat-title">{{ $category->value }}</span>
                            <a href="{{ route('customer.adverties.category', $category) }}"><span class="ad-cat-btn">مشاهده همه</span></a>
                        </div>
                        <div class="ad-cat-body">
                            @foreach ($category->adverties()->where('status', 1)->limit(3)->get() as $advert)
                                <div class="ad-cat-item">
                                    <div class="ad-cat-item-img">
                                        <img src="{{ asset($advert->imageAdvert()->path['indexArray']['small']) }}"
                                            alt="{{ $advert->title }}">
                                    </div>
                                    <div class="ad-cat-item-text">
                                        <span class="ad-cat-item-company">{{ $advert->full_name }}</span>
                                        <a href="{{ route('customer.advert.show', $advert->id) }}"><span
                                                class="ad-cat-item-jobtitle">{{ $advert->title }}</span></a>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    @endif
                @endforeach


            </div>
        </section>
        <section class="latest-news">
            <span class="title-home">آخرین <span class="color-text">اخبار</span></span>
            <div class="latest-news-sec">
                <div class="latest-news-item">
                    <div class="news-header">
                        <span class="latest-news-cat-title">اخبار مشاغل</span>
                        <span class="latest-news-showmore">مشاهده بیشتر</span>
                    </div>
                    <div class="Horizontal-news-box">
                        <div class="news-img">
                            <img src="{{ asset('customer-assets/img/rectangle_44.webp') }}" alt="">
                        </div>
                        <div class="news-des">
                            <div class="news-title">
                                <span>عنوان موردنظر شما در اینجا قرار میگیرد</span>
                            </div>
                            <div class="news-time">
                                <span>25 مهر 1402</span>
                            </div>
                            <div class="news-exp">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                            </div>
                        </div>
                    </div>
                    <div class="Horizontal-news-box">
                        <div class="news-img">
                            <img src="{{ asset('customer-assets/img/rectangle_44.webp') }}" alt="">
                        </div>
                        <div class="news-des">
                            <div class="news-title">
                                <span>عنوان موردنظر شما در اینجا قرار میگیرد</span>
                            </div>
                            <div class="news-time">
                                <span>25 مهر 1402</span>
                            </div>
                            <div class="news-exp">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                            </div>
                        </div>
                    </div>
                    <div class="Horizontal-news-box">
                        <div class="news-img">
                            <img src="{{ asset('customer-assets/img/rectangle_44.webp') }}" alt="">
                        </div>
                        <div class="news-des">
                            <div class="news-title">
                                <span>عنوان موردنظر شما در اینجا قرار میگیرد</span>
                            </div>
                            <div class="news-time">
                                <span>25 مهر 1402</span>
                            </div>
                            <div class="news-exp">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="news-header">
                        <span class="latest-news-cat-title">اخبار مشاغل</span>
                        <span class="latest-news-showmore">مشاهده بیشتر</span>
                    </div>
                    <div class="Horizontal-news-box">
                        <div class="news-img">
                            <img src="{{ asset('customer-assets/img/rectangle_44.webp') }}" alt="">
                        </div>
                        <div class="news-des">
                            <div class="news-title">
                                <span>عنوان موردنظر شما در اینجا قرار میگیرد</span>
                            </div>
                            <div class="news-time">
                                <span>25 مهر 1402</span>
                            </div>
                            <div class="news-exp">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                            </div>
                        </div>
                    </div>
                    <div class="Horizontal-news-box">
                        <div class="news-img">
                            <img src="{{ asset('customer-assets/img/rectangle_44.webp') }}" alt="">
                        </div>
                        <div class="news-des">
                            <div class="news-title">
                                <span>عنوان موردنظر شما در اینجا قرار میگیرد</span>
                            </div>
                            <div class="news-time">
                                <span>25 مهر 1402</span>
                            </div>
                            <div class="news-exp">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                            </div>
                        </div>
                    </div>
                    <div class="Horizontal-news-box">
                        <div class="news-img">
                            <img src="{{ asset('customer-assets/img/rectangle_44.webp') }}" alt="">
                        </div>
                        <div class="news-des">
                            <div class="news-title">
                                <span>عنوان موردنظر شما در اینجا قرار میگیرد</span>
                            </div>
                            <div class="news-time">
                                <span>25 مهر 1402</span>
                            </div>
                            <div class="news-exp">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="news-header">
                        <span class="latest-news-cat-title">اخبار مشاغل</span>
                        <span class="latest-news-showmore">مشاهده بیشتر</span>
                    </div>
                    <div class="Horizontal-news-box">
                        <div class="news-img">
                            <img src="{{ asset('customer-assets/img/rectangle_44.webp') }}" alt="">
                        </div>
                        <div class="news-des">
                            <div class="news-title">
                                <span>عنوان موردنظر شما در اینجا قرار میگیرد</span>
                            </div>
                            <div class="news-time">
                                <span>25 مهر 1402</span>
                            </div>
                            <div class="news-exp">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                            </div>
                        </div>
                    </div>
                    <div class="Horizontal-news-box">
                        <div class="news-img">
                            <img src="{{ asset('customer-assets/img/rectangle_44.webp') }}" alt="">
                        </div>
                        <div class="news-des">
                            <div class="news-title">
                                <span>عنوان موردنظر شما در اینجا قرار میگیرد</span>
                            </div>
                            <div class="news-time">
                                <span>25 مهر 1402</span>
                            </div>
                            <div class="news-exp">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                            </div>
                        </div>
                    </div>
                    <div class="Horizontal-news-box">
                        <div class="news-img">
                            <img src="{{ asset('customer-assets/img/rectangle_44.webp') }}" alt="">
                        </div>
                        <div class="news-des">
                            <div class="news-title">
                                <span>عنوان موردنظر شما در اینجا قرار میگیرد</span>
                            </div>
                            <div class="news-time">
                                <span>25 مهر 1402</span>
                            </div>
                            <div class="news-exp">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
