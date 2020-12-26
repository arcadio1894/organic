<?php

namespace App\Providers;

use App\Department;
use App\Observers\DepartmentObserver;
use Illuminate\Support\Facades\URL;
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
        //Department::observe(DepartmentObserver::class);

        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
