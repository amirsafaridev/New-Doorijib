<header>
    <section class="first-sec">
        <div class="logo">
            <img src="{{ asset('customer-assets/img/logo_final_3_1.webp')}}" alt="logo-Doorijob">
        </div>
        <div class="menu">
            <span class="menu-item home">
                <a href="{{ route("home.index") }}">خانه</a>
            </span>
            <span class="menu-item personal-lib">
                <a href="#?">کتابخانه توسعه فردی</a>
            </span>
            <span class="menu-item total-emp">
                <a href="#?">استخدام سراسری</a>
            </span>
        </div>
    </section>
    <div class="second-sec">
        <section class="header-buttons">
            <div class="login-text">
                <span class="login-text-title">کارفرما یا کارجو هستید؟</span>
                <span class="login-text-des">کلیک کنید</span>
            </div>
            @guest
            <div class="signin-btn">
                <button style="cursor: pointer" onclick="window.location.href='{{ route('customer.auth.login') }}'" type="button" class="btn">ورود / ثبت نام</button>
            </div>
            @endguest

            <div class="add-new-btn">
                <button style="cursor: pointer" onclick="window.location.href='{{ route('customer.adverties.create') }}'" type="button" class="btn">ثبت آگهی</button>
            </div>
        </section>
    </div>
    <section class="header-mob">
        <div class="add-new-icon">
            <img onclick="window.location.href='{{ route('customer.adverties.create') }}'" src="{{ asset('customer-assets/img/add_new.webp')}}" alt="add-icon">
        </div>
        <div class="user-icon">
            <img onclick="window.location.href='{{ route('customer.account.index') }}'" src="{{ asset('customer-assets/img/user.webp')}}" alt="user">
        </div>
        <section class="top-nav">
            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
            </label>
            <ul class="menu-nav">
              <li><a href="{{ route("home.index") }}">خانه</a></li>
              <li>کتابخانه توسعه فردی</li>
              <li>استخدام سراسری</li>
            </ul>
        </section>
    </section>
</header>

