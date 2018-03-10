<?php

namespace Contentify\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Contentify\ModelHandler;

class ModelHandlerServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register instance container to the underlying class object
        $this->app->singleton('modelHandler', function () {
            return new ModelHandler;
        });

        // Shortcut so we don't need to add an alias in app/config/app.php
        $this->app->booting(function()
        {
            $loader = AliasLoader::getInstance();
            $loader->alias('ModelHandler', 'Contentify\Facades\ModelHandler');
        });
    }
    
}