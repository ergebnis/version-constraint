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

final class CaretVersionRangeProvider extends VersionConstraint\Test\DataProvider\Composer\AbstractDataProvider
{
    /**
     * @see https://getcomposer.org/doc/articles/versions.md#caret-version-range-
     * @see https://github.com/composer/semver/blob/3.4.4/tests/VersionParserTest.php#L490-L516
     *
     * @return \Generator<string, array{0: string}>
     */
    public static function valid(): \Generator
    {
        yield from self::provideValues([
            'caret-major-large-minor-large-patch-one-stability-stable' => '^201903.205830.1-stable',
            'caret-major-large-minor-zero' => '^201903.0',
            'caret-major-large-minor-zero-stability-beta' => '^201903.0-beta',
            'caret-major-minor-x-dev' => '^2.x-dev',
            'caret-major-minor-zero-patch-asterisk-dev' => '^2.0.*-dev',
            'caret-major-minor-zero-patch-extra-x-dev' => '^2.0.3.x-dev',
            'caret-major-minor-zero-patch-x-dev' => '^2.0.x-dev',
            'caret-major-one-minor' => '^1.2',
            'caret-major-one-minor-patch' => '^1.2.3',
            'caret-major-one-minor-patch-extra' => '^1.2.3.4',
            'caret-major-one-minor-patch-stability-beta-and-number' => '^1.2.3-beta.2',
            'caret-major-zero' => '^0',
            'caret-major-zero-minor' => '^0.2',
            'caret-major-zero-minor-patch' => '^0.2.3',
            'caret-major-zero-minor-patch-zero' => '^0.2.0',
            'caret-major-zero-minor-x-dev' => '^0.x-dev',
            'caret-major-zero-minor-zero' => '^0.0',
            'caret-major-zero-minor-zero-patch' => '^0.0.3',
            'caret-major-zero-minor-zero-patch-stability-alpha' => '^0.0.3-alpha',
            'caret-major-zero-minor-zero-patch-stability-dev' => '^0.0.3-dev',
            'caret-major-zero-minor-zero-patch-stability-stable' => '^0.0.3-stable',
            'caret-v-major-one' => '^v1',
        ]);
    }
}
