# Changelog

All notable changes to `laravel-stubs` will be documented in this file.

## Unreleased

- Support Laravel 11, 12, and 13 on a single branch (PHP 8.2+)
- New stubs: `enum`, `enum.backed`, `class`, `class.invokable`, `trait`, `scope`,
  `cast.inbound`, singleton controllers (4 variants), `pest`, `pest.unit`
- Migrations use anonymous classes; model stub ships a `casts()` method
- Classes are no longer marked `final`
- `stubs:publish` reports how many stubs were published (`X / Y`)
- Fixed `policy.plain` stub declaring a return type on its constructor
- Replaced Travis CI + StyleCI with GitHub Actions
- Added `.gitattributes` so dist archives exclude tests and meta files

## 1.x

- See GitHub releases for earlier history.
