<?php namespace RootStudio\RootForms;

use Illuminate\Support\ServiceProvider;

/**
 * Class RootFormServiceProvider
 *
 * @package RootStudio\RootForms
 * @author James Wigger <james@rootstudio.co.uk>
 */
class RootFormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerViews();

        $this->registerPublishables();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('FormField', function () {
            return new FormField();
        });
    }

    /**
     * Register config for package
     */
    private function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/rootforms.php', 'rootforms'
        );
    }

    /**
     * Register view namespace for package
     */
    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views/', 'rootforms');
    }

    /**
     * Set publishable assets
     */
    private function registerPublishables()
    {
        $this->publishes([
            __DIR__ . '/../config/rootforms.php' => config_path('rootforms.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views/' => resource_path('views/vendor/rootforms'),
        ], 'views');
    }
}
