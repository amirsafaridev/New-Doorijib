
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
@include('customer.layouts.head-tag')
@yield('head-tag')

</head>

<body>

    @include('customer.layouts.header')





@yield('content')



@include('customer.layouts.footer')

    @include('customer.layouts.scripts')
    @yield('scripts')
@include('admin.alerts.sweetalert.success')
@include('admin.alerts.sweetalert.error')
@include('admin.alerts.sweetalert.warning')
</body>

</html>
