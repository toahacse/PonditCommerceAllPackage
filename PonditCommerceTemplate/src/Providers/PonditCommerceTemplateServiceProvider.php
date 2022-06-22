<?php

namespace Pondit\PonditCommerce\PonditCommerceTemplate\Providers;

use Illuminate\Support\ServiceProvider;

class PonditCommerceTemplateServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/ponditcommercetemplate/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'ponditcommercetemplate');
    }

    public function register(): void
    {
        // Register stuffs
    }
}
