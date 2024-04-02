<?php

namespace App\Providers;

use App\Models\Option;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('path.public', function() {
            return base_path('../public_html');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['customer.layouts.footer', 'customer.account-layouts.header'], function ($view) {
            $view->with('setting', Option::where('key', 'setting')->first());
            $view->with('footers', Option::where('key', 'footer')->get());
            $view->with('economicSymbols', Option::where('key', 'economicSymbol')->get());
        });
    }
}
