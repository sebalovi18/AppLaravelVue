<?php

namespace App\Providers;

use App\Http\Services\Clientes\ServiceClientesCrud;
use App\Http\Services\Emails\ServiceEnvioMails;
use App\Mail\MailPromo;
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
            return new ServiceEnvioMails($app->make(ServiceClientesCrud::class) , $app->make(MailPromo::class));
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
