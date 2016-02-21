<?php

namespace Burthorpe\Exception;

class UnknownPlayerException extends Exception
{
    public function __construct($playerName)
    {
        parent::__construct("Unknown player: {$playerName}");
    }
}