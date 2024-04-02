<footer>
    <div class="footer-bg">
        <div class="footer-col1">
            <div class="footer-title">
                <span class="icon-footer">دسترسی سریع</span>
            </div>
            <li class="footer-links">
                @foreach ($footers as $footer)
                    <ul><a href="{{ $footer->value['link'] }}">{{ $footer->value['title'] }}</a></ul>
                @endforeach
            </li>
        </div>
        <div class="footer-col2">
            <div class="footer-logo">
                <img src="{{ asset('customer-assets/img/logo_final_3_1.webp') }}" alt="logo">
            </div>
            <div class="footer-des">
                <span>{!! $setting->value['description'] !!}</span>
            </div>
            <div class="footer-social-icons">
                <a href="{{ $setting->value['linkedin'] }}"><img src="{{ asset('customer-assets/img/linkedin.webp') }}"
                        alt="linkedin"></a>
                <a href="{{ $setting->value['instagram'] }}"><img
                        src="{{ asset('customer-assets/img//instagram.webp') }}" alt="instagram"></a>
                <a href="{{ $setting->value['telegram'] }}"><img src="{{ asset('customer-assets/img/telegram.webp') }}"
                        alt="telegram"></a>
            </div>
        </div>
        <div class="footer-col3">
            <div class="footer-title">
                <span class="icon-footer">نمادها</span>
            </div>
            <div>
                @foreach ($economicSymbols as $economicSymbol)
                    <a href="{{ $economicSymbol->link }}"> <img src="{{ asset($economicSymbol->imageOption()->path) }}" alt="{{ $economicSymbol->title }}">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
