<?php namespace Burthorpe\Runescape\Integrations\Laravel;

use Burthorpe\Runescape\EvolutionOfCombat;
use Burthorpe\Runescape\OldSchool;
use Illuminate\Support\ServiceProvider;

class BurthorpeRunescapeServiceProvider extends ServiceProvider {

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
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
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

}
