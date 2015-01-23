# Runescape API

[![Build Status](https://travis-ci.org/Burthorpe/runescape-api.svg?branch=master)](https://travis-ci.org/Burthorpe/runescape-api) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Burthorpe/runescape-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Burthorpe/runescape-api/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/Burthorpe/runescape-api/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Burthorpe/runescape-api/?branch=master) [![Latest Stable Version](https://poser.pugx.org/burthorpe/runescape-api/v/stable.svg)](https://packagist.org/packages/burthorpe/runescape-api) [![Total Downloads](https://poser.pugx.org/burthorpe/runescape-api/downloads.svg)](https://packagist.org/packages/burthorpe/runescape-api) [![Latest Unstable Version](https://poser.pugx.org/burthorpe/runescape-api/v/unstable.svg)](https://packagist.org/packages/burthorpe/runescape-api) [![License](https://poser.pugx.org/burthorpe/runescape-api/license.svg)](https://packagist.org/packages/burthorpe/runescape-api)

Provides an interface to interact with the runescape site and APIs.

## Installation

```sh
composer require burthorpe/runescape-api
```

## Integrations

Currently only Laravel is supported for integrations, but you should be able to use this with any framework or codebase
 
### Laravel
 
 Add the following to your service providers if your `config/app.php`

```php
'Burthorpe\Runescape\Integrations\Laravel\BurthorpeRunescapeServiceProvider',
```

## Copyright & License

Copyright (c) 2014 Wade Urry - Released under the [MIT license](LICENSE).
