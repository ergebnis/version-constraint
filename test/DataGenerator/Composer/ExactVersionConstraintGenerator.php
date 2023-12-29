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

namespace Ergebnis\VersionConstraint\Test\DataGenerator\Composer;

use Ergebnis\VersionConstraint\Test;

/**
 * @see https://getcomposer.org/doc/articles/versions.md#exact-version-constraint
 */
final class ExactVersionConstraintGenerator implements Test\DataGenerator\StringGenerator
{
    private readonly Test\DataGenerator\StringGenerator $generator;

    public function __construct()
    {
        $this->generator = new Test\DataGenerator\StringConcatenatingGenerator(
            new Test\DataGenerator\ValueGenerator(
                '',
                'v',
            ),
            new Test\DataGenerator\Composer\ExactVersionGenerator(),
        );
    }

    public function generate(): \Generator
    {
        foreach ($this->generator->generate() as $exactVersionConstraint) {
            yield $exactVersionConstraint;
        }
    }
}
