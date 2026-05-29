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

final class HyphenatedVersionRangeProvider extends VersionConstraint\Test\DataProvider\Composer\AbstractDataProvider
{
    /**
     * @see https://getcomposer.org/doc/articles/versions.md#hyphenated-version-range-
     * @see https://github.com/composer/semver/blob/3.4.4/tests/VersionParserTest.php#L540-L558
     *
     * @return \Generator<string, array{0: string}>
     */
    public static function valid(): \Generator
    {
        yield from self::provideValues([
            'hyphenated-major-minor-x-dev-to-major-minor-x-dev' => '2.x-dev - 3.x-dev',
            'hyphenated-major-minor-zero-patch-extra-x-dev-to-major-minor-zero-patch-extra-x-dev' => '2.0.3.x-dev - 3.0.3.x-dev',
            'hyphenated-major-minor-zero-patch-x-dev-to-major-minor-zero-patch-x-dev' => '2.0.x-dev - 3.0.x-dev',
            'hyphenated-major-one-minor-patch-stability-alpha-to-major-minor-stability-rc' => '1.2.3-alpha - 2.3-RC',
            'hyphenated-major-one-minor-patch-to-major-minor-patch-extra' => '1.2.3 - 2.3.4.5',
            'hyphenated-major-one-minor-stability-beta-to-major-minor' => '1.2-beta - 2.3',
            'hyphenated-major-one-minor-stability-beta-to-major-minor-stability-dev' => '1.2-beta - 2.3-dev',
            'hyphenated-major-one-minor-stability-rc-to-major-minor-patch-one' => '1.2-RC - 2.3.1',
            'hyphenated-major-one-minor-to-major-minor-one-patch' => '1.3 - 2.1.3',
            'hyphenated-major-one-minor-to-major-minor-one-patch-zero' => '1.2 - 2.1.0',
            'hyphenated-major-one-to-major-minor-one' => '1 - 2.1',
            'hyphenated-major-one-to-major-minor-zero' => '1 - 2.0',
            'hyphenated-major-zero-minor-x-dev-to-major-one-minor-x-dev' => '0.x-dev - 1.x-dev',
            'hyphenated-v-major-one-to-v-major' => 'v1 - v2',
        ]);
    }
}
