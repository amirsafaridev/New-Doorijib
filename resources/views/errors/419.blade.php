

<!doctype html>
<html lang="fa-IR" dir="rtl">

<head>


    <!-- TITLE -->
    <title>419</title>
    @include('admin.layouts.head-tag')

</head>

<body class="login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('admin-assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- End GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
              <!-- PAGE-CONTENT OPEN -->
              <div class="page-content error-page error2 text-white">
                <div class="container text-center">
                    <div class="error-template">
                        <h1 class="display-1 mb-2">419</h1>
                        <h5 class="error-details">
                            با عرض پوزش، خطایی رخ داده است، صفحه درخواستی یافت نشد!
                        </h5>
                        <div class="text-center">
                            <a class="btn btn-secondary mt-5 mb-5" href="index.html"> <i class="fa fa-long-arrow-left"></i> بازگشت به صفحه اصلی </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGE-CONTENT OPEN CLOSED -->
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE -->

    @include('admin.layouts.scripts')

</body>

</html>
