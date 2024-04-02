<div class="employer-right-menu">
    @php
        $userCompany = auth()->user()->metas()->where('key', 'company')->first();
        $user = auth()->user()->metas()->where('key', 'user')->first();
    @endphp
    <div style="margin-top: 15px">
        @if (!empty($userCompany))
            <img style="border-radius: 50%" src="{{ asset($userCompany->value['image']['indexArray']['medium']) }}"
                alt="company" />
        @elseif (empty($userCompany) && !empty($user))
            <img style="border-radius: 50%" src="{{ asset($user->value['image']['indexArray']['medium']) }}"
                alt="user">
        @else
            <img src="{{ asset('admin-assets/images/user-profile.png') }}" alt="profile" />
        @endif
    </div>
    @if (!empty($userCompany))
        <h3 class="employer-right-menu-company-name">{{ $userCompany->value['company_name'] }}</h3>
        <h4 class="employer-right-menu-subject">{{ $userCompany->value['subject'] }}</h4>
    @endif

    <a href="{{ route('customer.account.index') }}" class="employer-dashboard">پیشخوان</a>
    
    @if (auth()->user()->role == 1 || auth()->user()->role == 2)
        <a href="{{ route('customer.adverties.create') }}" class="employer-new-ad">درج آگهی جدید</a>
        <a href="{{ route('customer.account.advert-management') }}" class="employer-manage">مدیریت آگهی</a>
        <a href="{{ route('customer.account.company-profile') }}" class="employer-profile">پروفایل سازمانی</a>
    @endif

    @if (auth()->user()->role == 1 || auth()->user()->role == 0)
        <a href="{{ route('customer.account.profile') }}" class="job-seeker-profile">مشخصات فردی</a>

        <a href="{{ route('customer.account.user-resume') }}" class="job-seeker-send-cv">رزومه های ارسالی</a>

        <a href="{{ route('customer.account.user-bookmark') }}" class="job-seeker-bookmark">آگهی های نشان شده</a>
    @endif
    <a href="{{ route('customer.account.setting') }}" class="employer-setting">تنظیمات حساب کاربری</a>
    <a href="{{ route('customer.auth.logout') }}" class="employer-exit">خروج از حساب</a>
    <a href="#?" class="panel-contact"><img src="{{ asset('customer-assets/img/contact-btn.webp') }}"
            alt="panel"></a>
</div>
