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
            'tilde-major-leading-zero-one' => '~01',
            'tilde-major-minor-uppercase-x-dev' => '~2.X-dev',
            'tilde-major-minor-x-dev' => '~2.x-dev',
            'tilde-major-minor-x-separator-dot-dev' => '~2.x.dev',
            'tilde-major-minor-x-separator-none-dev' => '~2.xdev',
            'tilde-major-minor-zero-patch-extra-x-dev' => '~2.0.3.x-dev',
            'tilde-major-minor-zero-patch-x-dev' => '~2.0.x-dev',
            'tilde-major-one' => '~1',
            'tilde-major-one-minor' => '~1.2',
            'tilde-major-one-minor-patch' => '~1.2.3',
            'tilde-major-one-minor-patch-extra' => '~1.2.3.4',
            'tilde-major-one-minor-patch-extra-stability-beta' => '~1.2.3.4-beta',
            'tilde-major-one-minor-patch-stability-dev' => '~1.2.2-dev',
            'tilde-major-one-minor-patch-stability-stable' => '~1.2.2-stable',
            'tilde-major-one-minor-separator-dot-stability-beta' => '~1.2.beta',
            'tilde-major-one-minor-separator-none-stability-beta' => '~1.2beta',
            'tilde-major-one-minor-separator-underscore-stability-beta' => '~1.2_beta',
            'tilde-major-one-minor-stability-a' => '~1.2-a',
            'tilde-major-one-minor-stability-alpha' => '~1.2-alpha',
            'tilde-major-one-minor-stability-b' => '~1.2-b',
            'tilde-major-one-minor-stability-beta' => '~1.2-beta',
            'tilde-major-one-minor-stability-beta-and-large-number' => '~1.2-beta10',
            'tilde-major-one-minor-stability-beta-and-number' => '~1.2-b2',
            'tilde-major-one-minor-stability-beta-separator-dash-and-number' => '~1.2-b-2',
            'tilde-major-one-minor-stability-beta-separator-dot-and-number' => '~1.2-b.2',
            'tilde-major-one-minor-stability-p' => '~1.2-p',
            'tilde-major-one-minor-stability-patch' => '~1.2-patch',
            'tilde-major-one-minor-stability-pl' => '~1.2-pl',
            'tilde-major-one-minor-stability-rc' => '~1.2-rc',
            'tilde-major-one-minor-stability-uppercase-rc' => '~1.2-RC',
            'tilde-major-one-minor-zero' => '~1.0',
            'tilde-major-one-minor-zero-patch-zero' => '~1.0.0',
            'tilde-major-one-stability-beta' => '~1-beta',
            'tilde-major-zero' => '~0',
            'tilde-major-zero-minor-x-dev' => '~0.x-dev',
            'tilde-v-major-minor-x-dev' => '~v2.x-dev',
            'tilde-v-major-one' => '~v1',
            'tilde-v-major-one-minor' => '~v1.2',
            'tilde-v-major-one-minor-stability-beta' => '~v1.2-beta',
        ]);
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function invalid(): \Generator
    {
        yield from self::provideInvalidValues([
            'tilde-major-minor-x-separator-underscore-dev' => '~2.x_dev',
        ]);
    }
}
