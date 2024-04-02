@extends('customer.layouts.master')
@section('head-tag')
    <title>ورود به سایت</title>
@endsection
@section('content')
    <section class="login-page">
        <div class="login-box">
            <div class="login-title-box">
                <img src="{{ asset('customer-assets/img/rectangle_59.webp') }}" alt="login" class="login-top-line">
                <h5 class="login-title">ورود / ثبت نام</h5>
            </div>
            <form action="{{ route("customer.auth.store-login") }}" method="POST" class="login-form">
                @csrf
                <input type="text" name="username" placeholder="نام کاربری">
                <input type="password" name="password" placeholder="رمز عبور">
                <div class="login-forget-pass">
                    <span><a href="#?">فراموشی رمز عبور</a></span>
                    <span><a href="{{ route('customer.auth.register') }}">اگر هنوز ثبت نام نکرده اید کلیک کنید</a></span>
                </div>
                <button class="login-button" type="submit"><img src="./assets/img/left-arrow.webp"
                        alt="">ورود</button>
            </form>
        </div>
    </section>
@endsection
