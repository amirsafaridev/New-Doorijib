@extends('customer.account-layouts.master')
@section('head-tag')
    <title>پروفابل</title>
@endsection
@section('content')
    <section class="job-seeker-panel-page">
        <div class="page-title-des">
            <span>تنظیمات حساب کاربری</span>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div>
            <form action="{{ route('customer.account.update.user', $user->id) }}" class="job-seeker-setting-form"
                method="POST">
                @method('PUT')
                @csrf
                <input name="first_name" value="{{ old('first_name', $user->first_name) }}" type="text" placeholder="نام">
                <input name="last_name" value="{{ old('last_name', $user->last_name) }}" type="text"
                    placeholder="نام خانوادگی">
                {{-- <input name="phone_number" type="tel" placeholder="شماره تماس"> --}}
                <input name="password" type="password" placeholder="رمز">
                <input name="password_confirmation" type="password" placeholder="تکرار رمز">
                <button type="submit" class="panel-button">ذخیره</button>
            </form>
        </div>
    </section>
@endsection
