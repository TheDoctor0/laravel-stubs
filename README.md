# Laravel Stubs

[![Tests](https://github.com/TheDoctor0/laravel-stubs/actions/workflows/tests.yml/badge.svg)](https://github.com/TheDoctor0/laravel-stubs/actions/workflows/tests.yml)
[![Packagist](https://img.shields.io/packagist/v/TheDoctor0/laravel-stubs.svg)](https://packagist.org/packages/TheDoctor0/laravel-stubs)
[![Packagist](https://img.shields.io/packagist/dt/TheDoctor0/laravel-stubs.svg)](https://packagist.org/packages/TheDoctor0/laravel-stubs)
[![PHP](https://img.shields.io/packagist/dependency-v/TheDoctor0/laravel-stubs/php.svg)](https://packagist.org/packages/TheDoctor0/laravel-stubs)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/TheDoctor0/laravel-stubs/blob/master/LICENSE.md)

This package contains opinionated versions of the Laravel stubs for Artisan `make` commands.

## Version support

| Package | Laravel | PHP |
|---|---|---|
| 2.x | 11.x, 12.x, 13.x | 8.2+ |
| 1.x | 8.x | 7.4+ |

## Changes

- `strict_types` are declared by default
- return type hints are present where possible
- missing parameter type hints have been added
- migrations use anonymous classes and don't have a `down` function
- the model stub ships a `casts()` method
- form requests don't have an `authorize` function
- extra stubs Laravel doesn't publish: enums, plain classes, traits, scopes,
  inbound casts, singleton controllers, and Pest tests

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

Already-published stubs are skipped unless you pass `--force`.

## Testing

``` bash
composer test
```

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)

## License

The MIT License (MIT). Please see [license file](LICENSE.md) for more information.
