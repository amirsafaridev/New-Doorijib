
<!doctype html>
<html lang="fa-IR" dir="rtl">

<head>


    <!-- TITLE -->
    <title>500</title>
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
                        <h1 class="display-1 mb-2">5<span class="custom-emoji"><svg xmlns="http://www.w3.org/2000/svg" height="140" width="140" data-name="Layer 1" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#a2a1ff"/><circle cx="15" cy="10" r="1" fill="#6563ff"/><circle cx="9" cy="10" r="1" fill="#6563ff"/><path fill="#6563ff" d="M11.499,17.05957a1,1,0,0,1-.87109-1.48926A5.02491,5.02491,0,0,1,15,13a1,1,0,0,1,0,2,3.02357,3.02357,0,0,0-2.62793,1.54883A.99968.99968,0,0,1,11.499,17.05957Z"/></svg></span>0</h1>
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
