<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/version-constraint
 */

namespace Ergebnis\VersionConstraint\Test\DataProvider\Composer;

use Ergebnis\VersionConstraint;

final class WildCardVersionRangeProvider extends VersionConstraint\Test\DataProvider\Composer\AbstractDataProvider
{
    /**
     * @see https://getcomposer.org/doc/articles/versions.md#wildcard-version-range-
     * @see https://github.com/composer/semver/blob/3.4.4/tests/VersionParserTest.php#L401-L419
     *
     * @return \Generator<string, array{0: string}>
     */
    public static function valid(): \Generator
    {
        yield from self::provideValues([
            'wildcard' => '*',
            'wildcard-major-large-minor-asterisk' => '20.*',
            'wildcard-major-large-minor-asterisk-patch-asterisk' => '20.*.*',
            'wildcard-major-minor-asterisk-patch-asterisk' => '2.*.*',
            'wildcard-major-minor-large-patch-uppercase-x' => '2.10.X',
            'wildcard-major-minor-one-patch-extra-asterisk' => '2.1.3.*',
            'wildcard-major-minor-patch-x' => '2.2.x',
            'wildcard-major-minor-x' => '2.x',
            'wildcard-major-minor-x-patch-x' => '2.x.x',
            'wildcard-major-minor-zero-patch-asterisk' => '2.0.*',
            'wildcard-major-zero-minor-asterisk' => '0.*',
            'wildcard-major-zero-minor-asterisk-patch-asterisk' => '0.*.*',
            'wildcard-major-zero-minor-x' => '0.x',
            'wildcard-major-zero-minor-x-patch-x' => '0.x.x',
            'wildcard-v-major-minor-asterisk' => 'v2.*',
        ]);
    }
}
