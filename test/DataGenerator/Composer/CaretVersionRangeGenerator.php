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

namespace Ergebnis\VersionConstraint\Test\DataGenerator\Composer;

use Ergebnis\DataGenerator;
use Ergebnis\VersionConstraint\Test;

/**
 * @see https://getcomposer.org/doc/articles/versions.md#exact-version-constraint
 */
final class CaretVersionRangeGenerator implements DataGenerator\StringGenerator
{
    private readonly DataGenerator\StringGenerator $generator;

    public function __construct()
    {
        $this->generator = new DataGenerator\ConcatenatingValueGenerator(
            new DataGenerator\ValueGenerator('^'),
            new Test\DataGenerator\Composer\ExactVersionConstraintGenerator(),
        );
    }

    public function generate(): \Generator
    {
        foreach ($this->generator->generate() as $caretVersionRange) {
            yield $caretVersionRange;
        }
    }
}
