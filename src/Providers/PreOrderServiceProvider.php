<?php

namespace YourVendor\PreOrderAddon\Providers;

use Illuminate\Support\ServiceProvider;

class PreOrderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/preorder.php', 'preorder'
        );
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->publishes([
            __DIR__ . '/../../config/preorder.php' => config_path('preorder.php'),
        ], 'preorder-config');
    }
}
