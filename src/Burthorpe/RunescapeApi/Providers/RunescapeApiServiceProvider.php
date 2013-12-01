<?php

namespace Burthorpe\RunescapeApi\Providers;

use Illuminate\Support\ServiceProvider;
use Burthorpe\RunescapeApi\RunescapeApi;

class RunescapeApiServiceProvider extends ServiceProvider
{

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
        return array('runescape_api');
    }

}
