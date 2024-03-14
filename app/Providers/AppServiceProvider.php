<?php

namespace App\Providers;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void

    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        //
//        $locale = App::currentLocale();
//        App::setLocale($locale);
        App::setLocale('en');
//        dd((App::isLocale('en')));
//        $locale = App::currentLocale();
//        dd($locale);
    }
}
