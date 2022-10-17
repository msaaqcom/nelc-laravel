<?php

namespace Msaaq\NelcLaravel;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class NelcServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Nelc::class, function () {
            return new Nelc(
                key: Config::get('services.nelc.key'),
                secret: Config::get('services.nelc.secret'),
                platformIdentifier: Config::get('services.nelc.platform.identifier'),
                platformName: Config::get('services.nelc.platform.name'),
                isSandbox: Config::get('services.nelc.sandbox'),
            );
        });
    }
}
