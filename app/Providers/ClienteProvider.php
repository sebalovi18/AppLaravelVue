<?php

namespace App\Providers;

use App\Http\Services\Clientes\ServiceClientesCrud;
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
        $this->app->singleton(ServiceClientesCrud::class,function($app){
            return new ServiceClientesCrud(new Cliente);
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
