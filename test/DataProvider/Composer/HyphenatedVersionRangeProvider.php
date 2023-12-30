<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/version-constraint
 */

namespace Ergebnis\VersionConstraint\Test\DataProvider\Composer;

use Ergebnis\DataGenerator;
use Ergebnis\VersionConstraint\Test;

final class HyphenatedVersionRangeProvider
{
    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function valid(): \Generator
    {
        foreach (self::hyphenatedVersionRangeGenerator()->generate() as $value) {
            yield $value => [
                $value,
            ];
        }
    }

    private static function hyphenatedVersionRangeGenerator(): DataGenerator\StringGenerator
    {
        return new Test\DataGenerator\Composer\VersionConstraintParsingGenerator(new Test\DataGenerator\Composer\HyphenatedVersionRangeGenerator());
    }
}
