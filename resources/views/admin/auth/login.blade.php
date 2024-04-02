<!doctype html>
<html lang="fa-IR">

<head>



    <!-- TITLE -->
    <title>ورود</title>

    @include('admin.layouts.head-tag')

</head>

<body dir="rtl" class="app sidebar-mini rtl login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('admin-assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="{{ asset('admin-assets/images/brand/logo-white.png') }}" class="header-brand-img"
                            alt="brand">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <span class="login100-form-title pb-5">
                            ورود
                        </span>
                        <div class="panel panel-primary">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">نام
                                                کاربری</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 pt-5">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab5">
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf

                                            <div class="wrap-input100 validate-input input-group"
                                                data-bs-validate="ایمیل معتبر مورد نیاز است: ex@abc.xyz">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-white text-muted">
                                                    <i class="fe fe-user text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0"
                                                    name="user_name" type="text" placeholder="نام کاربری">
                                            </div>
                                            @error('user_name')
                                                <span class="rounded p-1 text-danger" role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" name="password"
                                                    type="password" placeholder="پسورد">
                                            </div>
                                            @error('password')
                                                <span class="rounded p-1 text-danger" role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                            <!-- Remember Me -->
                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox"
                                                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                                        name="remember">
                                                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">مرا به
                                                        یاد داشته باش</span>
                                                </label>
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <button type="submit" class="login100-form-btn btn-primary">
                                                    ورود
                                                </button>
                                            </div>
                                        </form>


                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
    @include('admin.layouts.scripts')
    @include('admin.alerts.sweetalert.success')
    @include('admin.alerts.sweetalert.error')

</body>


</html>
