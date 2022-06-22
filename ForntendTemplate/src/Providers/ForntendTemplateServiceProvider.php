<?php

namespace Pondit\PonditCommerce\ForntendTemplate\Providers;

use Illuminate\Support\ServiceProvider;

class ForntendTemplateServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/forntendtemplate/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'forntendtemplate');
    }

    public function register(): void
    {
        // Register stuffs
    }
}
