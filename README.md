# HEXADECIMAL COLOR VALIDATOR

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]

Validator for hexadecimal colors for Laravel 5.

## Install

Via Composer

``` bash
$ composer require russoedu/color-validator
```

**Together with Laravel**

As standard Laravel-procedure, just register the package in your providers array:

``` php
'providers' = [
    Russoedu\ColorValidator\ColorValidatorServiceProvider::class,
]
```

## Usage

#### Standalone

```php
use Olssonm\IdentityNumber\IdentityNumber as Pin;

Pin::isValid('19771211-2775');
// true
```

#### Laravel 5

The package extends the `Illuminate\Validator` via a service provider, so all you have to do is use the `personal_identity_number`-rule.

``` php
public function store(Request $request) {
    $this->validate($request, [
        'pnr' => 'personal_identity_number'
    ]);
}
```

Of course, you can roll your own error messages:

``` php
$validator = Validator::make($request->all(), [
    'pnr' => 'personal_identity_number'
], [
    'pnr.personal_identity_number' => "Hey! That's not a personnummer!"
]);

if($validator->fails()) {
    return $this->returnWithErrorAndInput($validator);
}
```

If you're using the validation throughout your application, you also might want to put the error message in your lang-files.

## Testing

``` bash
$ composer test
```

or

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

© 2015 [Marcus Olsson](https://marcusolsson.me).

[ico-version]: https://img.shields.io/packagist/v/olssonm/identity-number.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/olssonm/identity-number/master.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/olssonm/identity-number
[link-travis]: https://travis-ci.org/olssonm/identity-number
