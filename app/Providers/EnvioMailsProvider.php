<?php

namespace App\Providers;

use App\Http\Services\Clientes\ServiceClientesCrud;
use App\Http\Services\Emails\ServiceEnvioMails;
use App\Mail\EmailPromo;
use Illuminate\Support\ServiceProvider;

class EnvioMailsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceEnvioMails::class , function($app){
            return new ServiceEnvioMails($app->make(ServiceClientesCrud::class) , $app->make(EmailPromo::class));
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
