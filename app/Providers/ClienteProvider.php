<?php

namespace App\Providers;

use App\Services\Clientes\ServiceClientes;
use App\Models\Cliente;
use Illuminate\Support\ServiceProvider;

class ClienteProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ServiceClientes::class, 
            function ($app) {
                return new ServiceClientes($app->make(Cliente::class));
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
