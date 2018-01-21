# Hexadecimal Color Validator Rules for Laravel 5

Validator for hexadecimal colors for Laravel 5.

[![Software License][ico-license]](LICENSE.md)


* [Installation](#installation)
* [Usage](#usage)
* [License](#license)

<a name="installation"></a>
## Installation

Install the package through [Composer](http://getcomposer.org).

```
composer require "russoedu/colorvalidator:1.0"
```

Add the following to your `providers` array in `app/config/app.php`:

``` php
'providers' = [
    Russoedu\ColorValidator\ColorValidatorServiceProvider::class,
]
```

<a name="usage"></a>
## Usage

The package extends the `Illuminate\Validator` via a service provider, so all you have to do is use the `hex_color`-rule.

``` php
public function store(Request $request) {
    $this->validate($request, [
        'color' => 'hex_color'
    ]);
}
```

Of course, you can roll your own error messages:

``` php
$validator = Validator::make($request->all(), [
    'color' => 'hex_color'
], [
    'color.hex_color' => "Hey! That's not real color!"
]);

if($validator->fails()) {
    return $this->returnWithErrorAndInput($validator);
}
```

If you're using the validation throughout your application, you also might want to put the error message in your lang-files.

<a name="license"></a>
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
