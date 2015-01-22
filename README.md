# Runescape API

[![Build Status](https://travis-ci.org/Burthorpe/runescape-api.svg?branch=master)](https://travis-ci.org/Burthorpe/runescape-api)

Provides an interface to interact with the runescape site and APIs.

## Installation

Add `burthorpe/runescape-api` as a requirement to your composer.json:

```javascript
{
    "require": {
        "burthorpe/runescape-api": "dev-master"
    }
}
```

Update your packages with `composer update` or install with `composer install`.

Once Composer has installed or updated your packages you need to register the package with Laravel. Open up `app/config/app.php` and find the providers key, add:

```php
'Burthorpe\Runescape\Integrations\Laravel\BurthorpeRunescapeServiceProvider',
```

## Copyright & License

Copyright (c) 2014 Wade Urry - Released under the [MIT license](LICENSE).
