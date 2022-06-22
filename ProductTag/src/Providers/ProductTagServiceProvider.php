<?php

namespace Pondit\PonditCommerce\ProductTag\Providers;

use Illuminate\Support\ServiceProvider;

class ProductTagServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/producttag/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'producttag');
    }

    public function register(): void
    {
        // Register stuffs
    }
}
