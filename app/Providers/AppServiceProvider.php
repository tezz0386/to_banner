<?php

namespace App\Providers;

use App\Models\Admin\Setting\Setting;
use Illuminate\Support\Facades\View;
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
        //
        $setting = Setting::find(1);
        View::share('setting', $setting);
        define('SITE_NAME', $setting->name);
    }
}
