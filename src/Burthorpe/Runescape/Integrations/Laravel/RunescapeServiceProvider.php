<?php namespace Burthorpe\Runescape\Integrations\Laravel;

use Burthorpe\Runescape\Common;
use Burthorpe\Runescape\RS3\API as RS3;
use Illuminate\Support\ServiceProvider;

class RunescapeServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCustomValidators();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['burthorpe.runescape.common'] = $this->app->share(function()
        {
            return new Common();
        });

        $this->app['burthorpe.runescape.rs3'] = $this->app->share(function()
        {
            return new RS3();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['burthorpe.runescape.api', 'burthorpe.runescape.eoc'];
    }

    /**
     * Register the runescape_display_name validation rule with Laravel's validator
     *
     * @return void
     */
    public function registerCustomValidators()
    {
        $this->app->make('validator')->extend('runescape_display_name', '\Burthorpe\Runescape\Integrations\Laravel\Validator@validateDisplayName', ':attribute must be a valid Runescape Display Name (Maximum of 12 characters and only contain letters, numbers, dashes, underscores and spaces)');
    }

}
