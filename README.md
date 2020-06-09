# Laravel Stubs

This package contains opinionated versions of the Laravel stubs for Artisan make commands.

## Changes

- `strict_types` are declared by default
- return type hints are present where possible
- missing parameter type hints have been added
- all classes are `final`
- migrations don't have a `down` function
- form requests don't have `authorize` function

## Installation

You can install the package via composer:

```bash
composer require thedoctor0/laravel-stubs --dev
```

If you want to keep stubs up to date, add this hook to your composer.json file:

```json
"scripts": {
    "post-update-cmd": [
        "@php artisan stubs:publish --force"
    ]
}
```

## Usage

You can publish the stubs using this command:

```bash
php artisan stubs:publish
```

## Testing

``` bash
composer test
```

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)

## License

The MIT License (MIT). Please see [license file](LICENSE.md) for more information.
