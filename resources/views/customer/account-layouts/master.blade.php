<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
    @include('customer.account-layouts.head-tag')
    @yield('head-tag')
</head>

<body>
    <section class="panel">
        @include('customer.account-layouts.sidebar')
        <div class="panel-content">
            @include('customer.account-layouts.header')
            @yield('content')
            @include('customer.account-layouts.footer')
            @include('customer.account-layouts.scripts')
            @yield('scripts')
            @include('admin.alerts.sweetalert.success')
            @include('admin.alerts.sweetalert.error')
            @include('admin.alerts.sweetalert.warning')
            <div class="panel-content">
    </section>
</body>

</html>
