<?php

namespace Bastinald\LaravelBootstrapComponents\Providers;

use Bastinald\LaravelBootstrapComponents\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class LaravelBootstrapComponentsProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'bs');

        $this->publishes(
            [__DIR__ . '/../../config/laravel-bootstrap-components.php' => config_path('laravel-bootstrap-components.php')],
            ['laravel-bootstrap-components', 'laravel-bootstrap-components:config']
        );

        $this->publishes(
            [__DIR__ . '/../../resources/views' => resource_path('views/vendor/bs')],
            ['laravel-bootstrap-components', 'laravel-bootstrap-components:views']
        );
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-bootstrap-components.php', 'laravel-bootstrap-components');
    }
}
