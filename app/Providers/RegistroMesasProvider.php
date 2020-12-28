<?php

namespace App\Providers;

use App\Services\RegistroMesas\ServiceRegistroMesas;
use App\Models\Registro;
use Illuminate\Support\ServiceProvider;

class RegistroMesasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ServiceRegistroMesas::class,
            function ($app) {
                return new ServiceRegistroMesas($app->make(Registro::class));
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
