<?php

namespace App\Providers;

use App\Models\Producto;
use App\Services\Productos\ServiceProductos;
use Illuminate\Support\ServiceProvider;

class ProductoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceProductos::class,function($app){
            return new ServiceProductos($app->make(Producto::class));
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
