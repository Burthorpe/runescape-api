<?php namespace Burthorpe\RunescapeApi\Integrations\Laravel;

use Illuminate\Support\ServiceProvider;

class RunescapeApiServiceProvider extends ServiceProvider {

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
        $this->package('burthorpe/runescape-api');

        $this->app['runescape_api'] = $this->app->share(function($app)
        {
            return new RunescapeApi;
        });

        $this->app['runescape_api.eoc'] = $this->app->share(function($app)
        {
            return new EocApi;
        });

        $this->app['runescape_api.os'] = $this->app->share(function($app)
        {
            return new OsApi;
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
        return array('runescape_api', 'runescape_api.eoc', 'runescape_api.os');
    }

}
