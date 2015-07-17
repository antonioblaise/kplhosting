<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class DomainsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('domains', function(){
            return new \Kplhosting\Domains;
        });
    }
}
