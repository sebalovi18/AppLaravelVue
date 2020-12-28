<?php

namespace App\Providers;

use App\Mail\AutomaticFormResponse;
use App\Services\ContactoForm\ServiceContacto;
use Illuminate\Mail\Mailer;
use Illuminate\Support\ServiceProvider;

class ContactoFormProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ServiceContacto::class, 
            function ($app) {
                return new ServiceContacto(
                    $app->make(Mailer::class), 
                    $app->make(AutomaticFormResponse::class)
                );
            }
        );
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
