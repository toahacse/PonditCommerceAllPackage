<?php

namespace Pondit\PonditCommerce\UserInformation\Providers;

use Illuminate\Support\ServiceProvider;

class UserInformationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/userinformation/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'userinformation');
    }

    public function register(): void
    {
        // Register stuffs
    }
}
