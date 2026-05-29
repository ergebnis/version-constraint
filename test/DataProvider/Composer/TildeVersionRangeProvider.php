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

final class TildeVersionRangeProvider extends VersionConstraint\Test\DataProvider\Composer\AbstractDataProvider
{
    /**
     * @see https://getcomposer.org/doc/articles/versions.md#tilde-version-range-
     * @see https://github.com/composer/semver/blob/3.4.4/tests/VersionParserTest.php#L443-L466
     *
     * @return \Generator<string, array{0: string}>
     */
    public static function valid(): \Generator
    {
        yield from self::provideValues([
            'tilde-major-large-minor-large-patch-one-stability-stable' => '~201903.205830.1-stable',
            'tilde-major-large-minor-zero' => '~201903.0',
            'tilde-major-large-minor-zero-stability-beta' => '~201903.0-beta',
            'tilde-major-large-minor-zero-stability-stable' => '~201903.0-stable',
            'tilde-major-minor-x-dev' => '~2.x-dev',
            'tilde-major-minor-zero-patch-extra-x-dev' => '~2.0.3.x-dev',
            'tilde-major-minor-zero-patch-x-dev' => '~2.0.x-dev',
            'tilde-major-one-minor' => '~1.2',
            'tilde-major-one-minor-patch' => '~1.2.3',
            'tilde-major-one-minor-patch-extra' => '~1.2.3.4',
            'tilde-major-one-minor-patch-stability-dev' => '~1.2.2-dev',
            'tilde-major-one-minor-patch-stability-stable' => '~1.2.2-stable',
            'tilde-major-one-minor-stability-beta' => '~1.2-beta',
            'tilde-major-one-minor-stability-beta-and-number' => '~1.2-b2',
            'tilde-major-one-minor-zero' => '~1.0',
            'tilde-major-one-minor-zero-patch-zero' => '~1.0.0',
            'tilde-major-zero-minor-x-dev' => '~0.x-dev',
            'tilde-v-major-one' => '~v1',
        ]);
    }
}
