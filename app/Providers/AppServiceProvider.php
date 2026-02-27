<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
        paginator::useBootstrap();

        // Share application settings (logo, banners, social links) with ALL views
        View::composer('*', function ($view) {
            if (!$view->offsetExists('application')) {
                static $application = null;
                if ($application === null) {
                    try {
                        $application = DB::table('applications')->first() ?: new \stdClass();
                    } catch (\Throwable $e) {
                        $application = new \stdClass();
                    }
                }
                $view->with('application', $application);
            }
        });
    }
}
