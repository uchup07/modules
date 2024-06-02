<?php

namespace Uchup07\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the provided services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the provided services.
     */
    public function register()
    {
        $default = config('modules.default_driver');
        $driver  = config('modules.drivers.'.$default);

        $this->app->bind('Uchup07\Modules\Contracts\Repository', $driver);
    }
}
