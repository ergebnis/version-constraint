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

final class ExactVersionConstraintProvider extends VersionConstraint\Test\DataProvider\Composer\AbstractDataProvider
{
    /**
     * @see https://getcomposer.org/doc/articles/versions.md#exact-version-constraint
     *
     * @return \Generator<string, array{0: string}>
     */
    public static function valid(): \Generator
    {
        yield from self::provideValues([
            'exact-major-one' => '1',
            'exact-major-one-minor' => '1.2',
            'exact-major-one-minor-patch' => '1.2.3',
            'exact-major-one-minor-patch-extra' => '1.2.3.4',
            'exact-major-zero' => '0',
            'exact-v-major-one' => 'v1',
            'exact-v-major-one-minor' => 'v1.2',
            'exact-v-major-one-minor-patch' => 'v1.2.3',
            'exact-v-major-one-minor-patch-extra' => 'v1.2.3.4',
        ]);
    }
}
