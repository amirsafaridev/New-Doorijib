@extends('customer.layouts.master')
@section('head-tag')
    <title>ورود به سایت</title>
@endsection
@section('content')
    <section class="signup-page">
        <div class="signup-box">
            <div class="login-title-box">
                <img src="{{ asset('customer-assets/img/rectangle_59.webp') }}" alt="register" class="signup-top-line">
                <h5 class="signup-title">ورود / ثبت نام</h5>
            </div>
            <form action="{{ route('customer.auth.store-register') }}" class="signup-form" method="POST">
                @csrf
                <div class="signup-checkbox">
                    <input type="radio" @if (old('role') == 0) checked @endif name="role" id="2" value="0">
                    <label for="job-seeker">ثبت نام کارجو</label>
                    <input type="radio" @if (old('role') == 1) checked @endif name="role" id="2" value="1">
                    <label for="employer">ثبت نام کارفرما</label>
                </div>
                <input type="text" value="{{ old('first_name') }}" name="first_name" placeholder="نام" class="signup-inp">
                <input type="text" value="{{ old('last_name') }}" name="last_name" placeholder="نام خانوادگی" class="signup-inp">
                <input type="text" value="{{ old('user_name') }}" name="user_name" placeholder="نام کاربری" class="signup-inp">
                <input type="text" value="{{ old('mobile') }}" name="mobile" placeholder="شماره تماس" class="signup-inp">
                <input type="password" name="password" placeholder="رمز عبور" class="signup-inp">
                <input name="password_confirmation" id="password_confirmation" type="password" class="signup-inp"
                    placeholder="رمز عبور را تکرار کنید" />
                <p>کد تایید به شماره تماس وارد شده ارسال خواهد شد</p>
                <div class="signup-condition-box">
                    <input type="checkbox" name="rule" value="signup-condition">
                    <label for="signup-condition">قوانین و شرایط سایت را مطالعه کرده ام و پذیرفتم</label>
                </div>
                <button class="signup-button" type="submit"><img src="./assets/img/left-arrow.webp"
                        alt="">ادامه</button>
            </form>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
    </section>
@endsection
