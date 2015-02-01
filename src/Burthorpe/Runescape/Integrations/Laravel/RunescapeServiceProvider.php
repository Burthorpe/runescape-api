<?php namespace Burthorpe\Runescape\Integrations\Laravel;

use Burthorpe\Runescape\EvolutionOfCombat;
use Burthorpe\Runescape\API;
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
        $this->app['burthorpe.runescape.api'] = $this->app->share(function()
        {
            return new API;
        });

        $this->app['burthorpe.runescape.eoc'] = $this->app->share(function()
        {
            return new EvolutionOfCombat;
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

    public function registerCustomValidators()
    {
        $this->app->make('validator')->extend('runescape_display_name', '\Burthorpe\Runescape\Integrations\Laravel\Validator@validateDisplayName', ':attribute must be a valid Runescape Display Name (Maximum of 12 characters and only contain letters, numbers, dashes, underscores and spaces)');
    }

}
