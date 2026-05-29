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

final class LessThanOrEqualVersionRangeProvider extends VersionConstraint\Test\DataProvider\Composer\AbstractDataProvider
{
    /**
     * @see https://getcomposer.org/doc/articles/versions.md#version-range
     *
     * @return \Generator<string, array{0: string}>
     */
    public static function valid(): \Generator
    {
        yield from self::provideValues([
            'less-than-or-equal-major-one' => '<=1',
            'less-than-or-equal-major-one-minor' => '<=1.2',
            'less-than-or-equal-major-one-minor-patch' => '<=1.2.3',
            'less-than-or-equal-major-one-minor-patch-extra' => '<=1.2.3.4',
            'less-than-or-equal-major-zero' => '<=0',
            'less-than-or-equal-v-major-one' => '<=v1',
            'less-than-or-equal-v-major-one-minor-patch' => '<=v1.2.3',
        ]);
    }
}
