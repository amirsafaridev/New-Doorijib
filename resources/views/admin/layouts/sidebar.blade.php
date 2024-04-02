 <!--APP-SIDEBAR-->
 <div class="sticky">
     <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
     <div class="app-sidebar">
         <div class="side-header">
             <a class="header-brand1" href="index.html">
                 <img src="{{ asset('admin-assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo"
                     alt="logo">
                 <img src="{{ asset('admin-assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo"
                     alt="logo">
                 <img src="{{ asset('admin-assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo"
                     alt="logo">
                 <img src="{{ asset('admin-assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1"
                     alt="logo">
             </a>
             <!-- LOGO -->
         </div>
         <div class="main-sidemenu">
             <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                     width="24" height="24" viewBox="0 0 24 24">
                     <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                 </svg></div>
             <ul class="side-menu">
                 <li class="sub-category">
                     <h3>اصلی</h3>
                 </li>
                 <li class="slide">
                     <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('admin.home') }}"><i
                             class="side-menu__icon fe fe-home"></i><span class ="side-menu__label">داشبورد</span></a>
                 </li>
                 <li class="sub-category">
                     <h3> کاربران</h3>
                 </li>
                 <li class="slide">
                     <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                             class="side-menu__icon fe fe-users"></i><span class="side-menu__label">بخش کاربری</span><i
                             class="angle fe fe-chevron-right"></i></a>
                     <ul class="slide-menu">
                         <li class="side-menu-label1"><a href="javascript:void(0)">کاربران</a></li>
                         <li><a href="{{ route('admin.users.admin-users.index') }}" class="slide-item"> کاربران
                                 ادمین</a></li>
                         <li><a href="{{ route('admin.users.customer-users.index') }}" class="slide-item"> مشتری‌ها</a>
                         </li>
                         <li><a href="{{ route('admin.users.employer-users.index') }}" class="slide-item"> کارفرمایان
                             </a></li>


                     </ul>
                 </li>

                 <li class="sub-category">
                     <h3> آگهی‌ها</h3>
                 </li>
                 <li class="slide">
                     <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                             class="side-menu__icon fa fa-tags"></i><span class="side-menu__label">بخش آگهی</span><i
                             class="angle fe fe-chevron-right"></i></a>
                     <ul class="slide-menu">
                         <li class="side-menu-label1"><a href="javascript:void(0)">بخش آگهی</a></li>
                         <li><a href="{{ route('admin.advertise-category.index') }}" class="slide-item"> دسته
                                 بندی‌ها</a></li>
                         <li><a href="{{ route('admin.advertise.index') }}" class="slide-item"> آگهی‌ها </a></li>
                         <li><a href="{{ route('admin.advertise.create') }}" class="slide-item"> ایجاد آگهی</a></li>
                         <li><a href="{{ route('admin.province.index') }}" class="slide-item"> استان‌ها </a></li>
                         <li><a href="{{ route('admin.city.index') }}" class="slide-item"> شهر‌ها </a></li>


                     </ul>
                 </li>

                 <li class="sub-category">
                     <h3> سفارشات</h3>
                 </li>
                 <li class="slide">
                     <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                             class="side-menu__icon zmdi zmdi-mall"></i><span class="side-menu__label">بخش
                             سفارشات</span><i class="angle fe fe-chevron-right"></i></a>
                     <ul class="slide-menu">
                         <li class="side-menu-label1"><a href="javascript:void(0)">بخش سفارشات</a></li>
                         <li><a href="{{ route('admin.orders.index') }}" class="slide-item"> تمام سفارشات</a></li>
                         <li><a href="{{ route('admin.orders.paid') }}" class="slide-item"> سفارشات برداخت شده</a></li>
                         <li><a href="{{ route('admin.orders.unpaid') }}" class="slide-item"> سفارشات برداخت نشده</a>
                         </li>
                         <li><a href="{{ route('admin.orders.waiting-for-pay') }}" class="slide-item"> سفارشات درانتظار
                                 برداخت</a></li>


                     </ul>
                 </li>



                 <li class="sub-category">
                     <h3> پلن‌های اشتراک</h3>
                 </li>
                 <li class="slide">
                     <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                             class="side-menu__icon fa fa-credit-card"></i><span class="side-menu__label">بخش پلن‌های
                             اشتراک</span><i class="angle fe fe-chevron-right"></i></a>
                     <ul class="slide-menu">
                         <li class="side-menu-label1"><a href="javascript:void(0)">بخش پلن‌های اشتراک</a></li>
                         <li><a href="{{ route('admin.sales-plan.index') }}" class="slide-item"> پلن‌های اشتراک</a>
                         </li>


                     </ul>
                 </li>
                 <li class="sub-category">
                     <h3> تنظیمات</h3>
                 </li>
                 <li class="slide">
                     <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                             class="side-menu__icon icon-settings"></i><span class="side-menu__label">بخش
                             تنظیمات</span><i class="angle fe fe-chevron-right"></i></a>
                     <ul class="slide-menu">
                         <li class="side-menu-label1"><a href="javascript:void(0)">بخش تنظیمات</a></li>
                         <li><a href="{{ route('admin.hero.index') }}" class="slide-item"> بنر اصلی</a></li>
                         <li><a href="{{ route('admin.setting.index') }}" class="slide-item"> تنظیمات سایت</a></li>
                         <li><a href="{{ route('admin.footer.index') }}" class="slide-item"> تنظیمات فوتر</a></li>
                         <li><a href="{{ route('admin.economic-symbol.index') }}" class="slide-item"> نمادهای اقتصادی</a></li>

                     </ul>
                 </li>
             </ul>
             <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                     width="24" height="24" viewBox="0 0 24 24">
                     <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                 </svg></div>
         </div>
     </div>
     <!--/APP-SIDEBAR-->
 </div>
