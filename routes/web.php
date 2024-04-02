<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Adverties\AdvertController;
use App\Http\Controllers\Admin\Adverties\CategoryController;
use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\Footer\FooterController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Province\ProvinceController;
use App\Http\Controllers\Admin\SalePlan\SalePlanController;
use App\Http\Controllers\Admin\Setting\EconomicSymbolsController;
use App\Http\Controllers\Admin\Setting\HeroController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Users\AdminUsersController;
use App\Http\Controllers\Admin\Users\CustomerController;
use App\Http\Controllers\Admin\Users\EmployerController;
use App\Http\Controllers\Customer\Adverties\AdvertiesController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\Account\AccountController;
use App\Http\Controllers\Customer\Auth\AuthController;
use App\Http\Controllers\Customer\CompanyProfile\CompanyProfileController;
use App\Http\Controllers\Customer\CustomerProfile\CustomerProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth','auth.admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');
    Route::prefix('users')->namespace('Users')->group(function () {
        //admin-users
        Route::prefix('admin-users')->group(function () {
            Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users.admin-users.index');
            Route::get('/create', [AdminUsersController::class, 'create'])->name('admin.users.admin-users.create');
            Route::post('/store', [AdminUsersController::class, 'store'])->name('admin.users.admin-users.store');
            Route::get('/edit/{admin}', [AdminUsersController::class, 'edit'])->name('admin.users.admin-users.edit');
            Route::put('/update/{admin}', [AdminUsersController::class, 'update'])->name('admin.users.admin-users.update');
            Route::delete('/destroy/{admin}', [AdminUsersController::class, 'destroy'])->name('admin.users.admin-users.destroy');
            Route::get('/search', [AdminUsersController::class, 'search'])->name('admin.users.admin-users.search');
        });
         //employer-users
         Route::prefix('employer-users')->group(function () {
            Route::get('/', [EmployerController::class, 'index'])->name('admin.users.employer-users.index');
            Route::get('/create', [EmployerController::class, 'create'])->name('admin.users.employer-users.create');
            Route::post('/store', [EmployerController::class, 'store'])->name('admin.users.employer-users.store');
            Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('admin.users.employer-users.edit');
            Route::put('/update/{employer}', [EmployerController::class, 'update'])->name('admin.users.employer-users.update');
            Route::delete('/destroy/{employer}', [EmployerController::class, 'destroy'])->name('admin.users.employer-users.destroy');
            Route::get('/search', [EmployerController::class, 'search'])->name('admin.users.employer-users.search');
        });
         //customer-users
         Route::prefix('customer-users')->group(function () {
            Route::get('/', [CustomerController::class, 'index'])->name('admin.users.customer-users.index');
            Route::get('/create', [CustomerController::class, 'create'])->name('admin.users.customer-users.create');
            Route::post('/store', [CustomerController::class, 'store'])->name('admin.users.customer-users.store');
            Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('admin.users.customer-users.edit');
            Route::put('/update/{customer}', [CustomerController::class, 'update'])->name('admin.users.customer-users.update');
            Route::delete('/destroy/{customer}', [CustomerController::class, 'destroy'])->name('admin.users.customer-users.destroy');
            Route::get('/search', [CustomerController::class, 'search'])->name('admin.users.customer-users.search');
        });
    });
     //advertise-category
     Route::prefix('advertise-category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.advertise-category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.advertise-category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.advertise-category.store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.advertise-category.edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.advertise-category.update');
        Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('admin.advertise-category.destroy');
        Route::get('/search', [CategoryController::class, 'search'])->name('admin.advertise-category.search');
    });
     //advertise
     Route::prefix('advertise')->group(function () {
        Route::get('/', [AdvertController::class, 'index'])->name('admin.advertise.index');
        Route::get('/create', [AdvertController::class, 'create'])->name('admin.advertise.create');
        Route::post('/store', [AdvertController::class, 'store'])->name('admin.advertise.store');
        Route::get('/edit/{advert}', [AdvertController::class, 'edit'])->name('admin.advertise.edit');
        Route::put('/update/{advert}', [AdvertController::class, 'update'])->name('admin.advertise.update');
        Route::delete('/destroy/{advert}', [AdvertController::class, 'destroy'])->name('admin.advertise.destroy');
        Route::get('/approved/{advert}', [AdvertController::class, 'approved'])->name('admin.advertise.approved');
        Route::get('/waiting/{advert}', [AdvertController::class, 'waiting'])->name('admin.advertise.waiting');

        Route::put('/reject/{advert}', [AdvertController::class, 'reject'])->name('admin.advertise.reject');
        Route::get('/search', [AdvertController::class, 'search'])->name('admin.advertise.search');
        Route::get('/get-cities/{province}', [AdvertController::class, 'getCities'])->name('customer.sales-process.get-cities');
    });
      //orders
      Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/paid', [OrderController::class, 'paid'])->name('admin.orders.paid');
        Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.orders.unpaid');
        Route::get('/waiting-for-pay', [OrderController::class, 'waitingForPay'])->name('admin.orders.waiting-for-pay');
        Route::get('/search', [OrderController::class, 'search'])->name('admin.orders.search');
    });
     //sales_plan
     Route::prefix('sales-plan')->group(function () {
        Route::get('/', [SalePlanController::class, 'index'])->name('admin.sales-plan.index');
        Route::get('/create', [SalePlanController::class, 'create'])->name('admin.sales-plan.create');
        Route::post('/store', [SalePlanController::class, 'store'])->name('admin.sales-plan.store');
        Route::get('/edit/{salePlan}', [SalePlanController::class, 'edit'])->name('admin.sales-plan.edit');
        Route::put('/update/{salePlan}', [SalePlanController::class, 'update'])->name('admin.sales-plan.update');
        Route::delete('/destroy/{salePlan}', [SalePlanController::class, 'destroy'])->name('admin.sales-plan.destroy');
        Route::get('/search', [SalePlanController::class, 'search'])->name('admin.sales-plan.search');
    });
     //province
     Route::prefix('province')->group(function () {
        Route::get('/', [ProvinceController::class, 'index'])->name('admin.province.index');
        Route::get('/create', [ProvinceController::class, 'create'])->name('admin.province.create');
        Route::post('/store', [ProvinceController::class, 'store'])->name('admin.province.store');
        Route::get('/edit/{province}', [ProvinceController::class, 'edit'])->name('admin.province.edit');
        Route::put('/update/{province}', [ProvinceController::class, 'update'])->name('admin.province.update');
        Route::delete('/destroy/{province}', [ProvinceController::class, 'destroy'])->name('admin.province.destroy');
    });
     //city
     Route::prefix('city')->group(function () {
        Route::get('/', [CityController::class, 'index'])->name('admin.city.index');
        Route::get('/create', [CityController::class, 'create'])->name('admin.city.create');
        Route::post('/store', [CityController::class, 'store'])->name('admin.city.store');
        Route::get('/edit/{city}', [CityController::class, 'edit'])->name('admin.city.edit');
        Route::put('/update/{city}', [CityController::class, 'update'])->name('admin.city.update');
        Route::delete('/destroy/{city}', [CityController::class, 'destroy'])->name('admin.city.destroy');
    });
     //hero
     Route::prefix('hero')->group(function () {
        Route::get('/', [HeroController::class, 'index'])->name('admin.hero.index');
        Route::get('/create', [HeroController::class, 'create'])->name('admin.hero.create');
        Route::post('/store', [HeroController::class, 'store'])->name('admin.hero.store');
        Route::get('/edit/{hero}', [HeroController::class, 'edit'])->name('admin.hero.edit');
        Route::put('/update/{hero}', [HeroController::class, 'update'])->name('admin.hero.update');
        Route::delete('/destroy/{hero}', [HeroController::class, 'destroy'])->name('admin.hero.destroy');
    });
    //setting
    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::get('/create', [SettingController::class, 'create'])->name('admin.setting.create');
        Route::post('/store', [SettingController::class, 'store'])->name('admin.setting.store');
        Route::get('/edit/{setting}', [SettingController::class, 'edit'])->name('admin.setting.edit');
        Route::put('/update/{setting}', [SettingController::class, 'update'])->name('admin.setting.update');
        Route::delete('/destroy/{setting}', [SettingController::class, 'destroy'])->name('admin.setting.destroy');
    });
     //footer
     Route::prefix('footer')->group(function () {
        Route::get('/', [FooterController::class, 'index'])->name('admin.footer.index');
        Route::get('/create', [FooterController::class, 'create'])->name('admin.footer.create');
        Route::post('/store', [FooterController::class, 'store'])->name('admin.footer.store');
        Route::get('/edit/{footer}', [FooterController::class, 'edit'])->name('admin.footer.edit');
        Route::put('/update/{footer}', [FooterController::class, 'update'])->name('admin.footer.update');
        Route::delete('/destroy/{footer}', [FooterController::class, 'destroy'])->name('admin.footer.destroy');
    });
    //economic-symbol
    Route::prefix('economic-symbol')->group(function () {
        Route::get('/', [EconomicSymbolsController::class, 'index'])->name('admin.economic-symbol.index');
        Route::get('/create', [EconomicSymbolsController::class, 'create'])->name('admin.economic-symbol.create');
        Route::post('/store', [EconomicSymbolsController::class, 'store'])->name('admin.economic-symbol.store');
        Route::get('/edit/{economicSymbol}', [EconomicSymbolsController::class, 'edit'])->name('admin.economic-symbol.edit');
        Route::put('/update/{economicSymbol}', [EconomicSymbolsController::class, 'update'])->name('admin.economic-symbol.update');
        Route::delete('/destroy/{economicSymbol}', [EconomicSymbolsController::class, 'destroy'])->name('admin.economic-symbol.destroy');
    });
});
 //sales_plan
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    //profile
    Route::middleware('auth.customer')->prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('customer.account.index');
        Route::get('/setting', [AccountController::class, 'setting'])->name('customer.account.setting');
        Route::put('/update-user/{user}', [AccountController::class, 'updateUser'])->name('customer.account.update.user');
        Route::get('/user-bookmark', [CustomerProfileController::class, 'userBookmark'])->name('customer.account.user-bookmark');
        Route::get('/user-resume', [CustomerProfileController::class, 'userResume'])->name('customer.account.user-resume');
        Route::get('/profile', [CustomerProfileController::class, 'profile'])->name('customer.account.profile');
        Route::post('/profile/store', [CustomerProfileController::class, 'profileStore'])->name('customer.account.profile.store');
        Route::get('/company-profile', [CompanyProfileController::class, 'companyProfile'])->name('customer.account.company-profile');
        Route::post('/company-profile/store', [CompanyProfileController::class, 'companyProfileStore'])->name('customer.account.company-profile.store');
        Route::get('/advert-management', [CompanyProfileController::class, 'advertManagement'])->name('customer.account.advert-management');
        Route::get('/resume-management/{advert}', [CompanyProfileController::class, 'resumeManagement'])->name('customer.account.resume-management');

        Route::prefix('advert')->group(function () {
            Route::get('/create', [AdvertiesController::class, 'create'])->name('customer.adverties.create');
            Route::get('/edit/{advert}', [AdvertiesController::class, 'edit'])->name('customer.adverties.edit');
            Route::post('/store', [AdvertiesController::class, 'store'])->name('customer.adverties.store');
            Route::put('/update/{advert}', [AdvertiesController::class, 'update'])->name('customer.adverties.update');
            });
    });
    Route::prefix('adverties')->group(function () {
        Route::get('/', [AdvertiesController::class, 'index'])->name('customer.adverties.index');
        Route::get('/approved/{resume}/{advert}', [AdvertiesController::class, 'approved'])->name('customer.advertise.approved');
        Route::get('/waiting/{resume}/{advert}', [AdvertiesController::class, 'waiting'])->name('customer.advertise.waiting');
        Route::get('/reject/{resume}/{advert}', [AdvertiesController::class, 'reject'])->name('customer.advertise.reject');
        Route::post('/search', [AdvertiesController::class, 'search'])->name('customer.adverties.search');
        Route::get('/jobs/{title1?}/{title2?}/{title3?}/{title4?}', [AdvertiesController::class, 'searchJobs'])->name('customer.adverties.search-jobs');
        Route::get('/category/{category:value}', [AdvertiesController::class, 'category'])->name('customer.adverties.category');

    });
    Route::get('/add-to-bookmark/advert/{advert}', [AdvertiesController::class, 'addToBookmark'])->name('customer.advert.add-to-bookmark');
    Route::get('/advert/{advert}', [AdvertiesController::class, 'show'])->name('customer.advert.show');
    Route::get('/add-to-resume/advert/{advert}', [AdvertiesController::class, 'addToResume'])->name('customer.advert.add-to-resume');
    Route::prefix('auth')->group(function () {
        Route::get('/register', [AuthController::class, 'register'])->name('customer.auth.register');
        Route::get('/login', [AuthController::class, 'login'])->name('customer.auth.login');
        Route::get('/logout', [AuthController::class, 'logout'])->name('customer.auth.logout');
        Route::post('/storeLogin', [AuthController::class, 'storeLogin'])->name('customer.auth.store-login');
        Route::post('/storeRegister', [AuthController::class, 'storeRegister'])->name('customer.auth.store-register');
        });
require __DIR__.'/auth.php';
