
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
@include('admin.layouts.head-tag')
@yield('head-tag')

</head>

<body class="app sidebar-mini rtl">
  <!-- GLOBAL-LOADER -->
  <div id="global-loader">
    <img src="{{ asset('admin-assets/images/loader.svg') }}" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">
    @include('admin.layouts.header')




 <!--app-content open-->
 <div class="main-content app-content mt-0">
    <div class="side-app">
@yield('content')
</div>
</div>
<!--app-content close-->
@include('admin.layouts.sidebar')



    @include('admin.layouts.scripts')
    @yield('scripts')
@include('admin.alerts.sweetalert.success')
@include('admin.alerts.sweetalert.error')
@include('admin.alerts.sweetalert.warning')

</body>

</html>
