<?php

namespace App\Providers;

use App\Services\Clientes\ServiceClientes;
use App\Services\Emails\ServiceEnvioMails;
use App\Mail\EmailPromo;
use Illuminate\Mail\Mailer;
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
            return new ServiceEnvioMails($app->make(ServiceClientes::class) , $app->make(EmailPromo::class) , $app->make(Mailer::class));
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
