<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;


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
        Config::set('app.timezone', 'Asia/Manila');
        date_default_timezone_set('Asia/Manila');

        logger('Current Time: ' . Carbon::now());

        DB::listen(function ($query) {
            Log::debug("SQL: " . $query->sql, $query->bindings);
        });
    }
}
