<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Number;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Kompatibilnost sa starim MySQL serverima
        Schema::defaultStringLength(191);

        // Jezik za datume
        Carbon::setLocale(config('app.locale'));

        // Jezik za format brojeva
        Number::useLocale('hr');

        // Paginacija
        //Paginator::defaultView('vendor.pagination.bootstrap-5');
        //Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-5');
    }
}
