<?php namespace Burthorpe\RunescapeApi\Facades;

use Illuminate\Support\Facades\Facade;

class EocApi extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'runescape_api.eoc';
    }

}
