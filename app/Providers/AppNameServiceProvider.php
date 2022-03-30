<?php

namespace App\Providers;

use App\Services\Service as Service;
use Illuminate\Support\ServiceProvider;

class AppNameServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Services\ServiceApi', function($app) {
          return new Service();
        });
    }
}