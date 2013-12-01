Runescape API
===============================

Provides an interface to interact with the runescape site and APIs.

Installation
------------

Add `burthorpe/runescape-api` as a requirement to your composer.json:

```javascript
{
    "require": {
        "burthorpe/runescape-api": "*"
    }
}
```

Update your packages with `composer update` or install with `composer install`.

Once Composer has installed or updated your packages you need to register the package with Laravel. Open up `app/config/app.php` and find the providers key, add:

```php
'Burthorpe\RunescapeApi\Providers\RunescapeApiServiceProvider',
'Burthorpe\RunescapeApi\Providers\OldSchoolApiServiceProvider'
```

In the aliases section, ass:

```php
'RunescapeApi' => 'Burthorpe\RunescapeApi\Facades\RunescapeApi',
'OldSchoolApi' => 'Burthorpe\RunescapeApi\Facades\OldSchoolApi'
```