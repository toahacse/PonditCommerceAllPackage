<?php

namespace Pondit\PonditCommerce\Banners\Providers;

use Illuminate\Support\ServiceProvider;

class BannersServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/banners/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'banners');
    }

    public function register(): void
    {
        // Register stuffs
    }
}
