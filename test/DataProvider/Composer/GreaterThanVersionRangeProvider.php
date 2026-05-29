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

final class GreaterThanVersionRangeProvider extends VersionConstraint\Test\DataProvider\Composer\AbstractDataProvider
{
    /**
     * @see https://getcomposer.org/doc/articles/versions.md#version-range
     *
     * @return \Generator<string, array{0: string}>
     */
    public static function valid(): \Generator
    {
        yield from self::provideValues([
            'greater-than-major-one' => '>1',
            'greater-than-major-one-minor' => '>1.2',
            'greater-than-major-one-minor-patch' => '>1.2.3',
            'greater-than-major-one-minor-patch-extra' => '>1.2.3.4',
            'greater-than-major-zero' => '>0',
            'greater-than-v-major-one' => '>v1',
            'greater-than-v-major-one-minor-patch' => '>v1.2.3',
        ]);
    }
}
