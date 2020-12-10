<?php

namespace App\Providers;

use App\Services\Noticias\ServiceNoticias;
use Illuminate\Support\ServiceProvider;

class NoticiasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ServiceNoticias::class,function($app){
            return new ServiceNoticias($app->make('Illuminate\Http\Client\Factory'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
