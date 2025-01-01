<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/version-constraint
 */

namespace Ergebnis\VersionConstraint\Test\DataGenerator\Composer;

use Ergebnis\DataGenerator;

/**
 * @see https://getcomposer.org/doc/articles/versions.md#version-range
 */
final class LessThanOrEqualVersionRangeGenerator implements DataGenerator\StringGenerator
{
    private readonly DataGenerator\StringGenerator $generator;

    public function __construct()
    {
        $this->generator = new DataGenerator\ConcatenatingValueGenerator(
            new DataGenerator\ValueGenerator('<='),
            new ExactVersionConstraintGenerator(),
        );
    }

    public function generate(): \Generator
    {
        foreach ($this->generator->generate() as $exactVersionConstraint) {
            yield $exactVersionConstraint;
        }
    }
}
