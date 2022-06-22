<?php

namespace Pondit\PonditCommerce\Label\Providers;

use Illuminate\Support\ServiceProvider;

class LabelServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/label/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'label');
    }

    public function register(): void
    {
        // Register stuffs
    }
}
