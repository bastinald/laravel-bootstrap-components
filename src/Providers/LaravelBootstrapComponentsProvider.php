<?php

namespace Bastinald\LaravelBootstrapComponents\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelBootstrapComponentsProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'bs');

        $this->publishes(
            [__DIR__ . '/../../resources/views' => resource_path('views/vendor/bs')],
            'laravel-bootstrap-components'
        );
    }
}
