# version-constraint

[![Integrate](https://github.com/ergebnis/version-constraint/workflows/Integrate/badge.svg)](https://github.com/ergebnis/version-constraint/actions)
[![Merge](https://github.com/ergebnis/version-constraint/workflows/Merge/badge.svg)](https://github.com/ergebnis/version-constraint/actions)
[![Release](https://github.com/ergebnis/version-constraint/workflows/Release/badge.svg)](https://github.com/ergebnis/version-constraint/actions)
[![Renew](https://github.com/ergebnis/version-constraint/workflows/Renew/badge.svg)](https://github.com/ergebnis/version-constraint/actions)

[![Code Coverage](https://codecov.io/gh/ergebnis/version-constraint/branch/main/graph/badge.svg)](https://codecov.io/gh/ergebnis/version-constraint)
[![Type Coverage](https://shepherd.dev/github/ergebnis/version-constraint/coverage.svg)](https://shepherd.dev/github/ergebnis/version-constraint)

[![Latest Stable Version](https://poser.pugx.org/ergebnis/version-constraint/v/stable)](https://packagist.org/packages/ergebnis/version-constraint)
[![Total Downloads](https://poser.pugx.org/ergebnis/version-constraint/downloads)](https://packagist.org/packages/ergebnis/version-constraint)
[![Monthly Downloads](http://poser.pugx.org/ergebnis/version-constraint/d/monthly)](https://packagist.org/packages/ergebnis/version-constraint)

This project provides a [`composer`](https://getcomposer.org) package with abstractions of version constraints.

## Installation

Run

```sh
composer require ergebnis/version-constraint
```

## Usage

This project comes with the following components:

- [`Ergebnis\VersionConstraint\Composer\TildeVersionRange`](#composertildeversionrange)

### `Composer\TildeVersionRange`

#### Create a `Composer\TildeVersionRange` from a string

```php
<?php

declare(strict_types=1);

use Ergebnis\VersionConstraint;

$versionConstraint = VersionConstraint\Composer\TildeVersionRange::fromString('~1.0.0');

echo $versionConstraint->toString(); // ~1.0.0
```

## Changelog

The maintainers of this project record notable changes to this project in a [changelog](CHANGELOG.md).

## Contributing

The maintainers of this project suggest following the [contribution guide](.github/CONTRIBUTING.md).

## Code of Conduct

The maintainers of this project ask contributors to follow the [code of conduct](https://github.com/ergebnis/.github/blob/main/CODE_OF_CONDUCT.md).

## General Support Policy

The maintainers of this project provide limited support.

You can support the maintenance of this project by [sponsoring @ergebnis](https://github.com/sponsors/ergebnis).

## PHP Version Support Policy

This project currently supports the following PHP versions:

- [PHP 7.4](https://www.php.net/releases/#7.4.0) (has reached its end of life on November 28, 2022)
- [PHP 8.0](https://www.php.net/releases/#8.0.0) (has reached its end of life on November 26, 2023)
- [PHP 8.1](https://www.php.net/releases/#8.1.0) (has reached its end of life on December 31, 2025)
- [PHP 8.2](https://www.php.net/releases/#8.2.0)
- [PHP 8.3](https://www.php.net/releases/#8.3.0)
- [PHP 8.4](https://www.php.net/releases/#8.4.0)
- [PHP 8.5](https://www.php.net/releases/#8.5.0)

The maintainers of this project add support for a PHP version following its initial release and _may_ drop support for a PHP version when it has reached its [end of life](https://www.php.net/supported-versions.php).

## Security Policy

This project has a [security policy](.github/SECURITY.md).

## License

This project uses the [MIT license](LICENSE.md).

## Social

Follow [@localheinz](https://twitter.com/intent/follow?screen_name=localheinz) and [@ergebnis](https://twitter.com/intent/follow?screen_name=ergebnis) on Twitter.
