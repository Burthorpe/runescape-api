<?php namespace Burthorpe\Runescape\Integrations\Laravel;

use Burthorpe\Runescape\RS3\API;

class Validator {

    /**
     * API Instance
     *
     * @var \Burthorpe\Runescape\RS3\API
     */
    protected $api;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->api = new API();
    }

    /**
     * Checks if the given string is a valid runescape display name
     *
     * @param n $attribute
     * @param n $value
     * @param n $params
     * @param n $validator
     * @return boolean
     */
    public function validateDisplayName($attribute, $value, $params, $validator)
    {
        return $this->api->validateDisplayName($value);
    }

}