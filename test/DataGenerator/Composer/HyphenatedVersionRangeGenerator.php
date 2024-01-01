<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/version-constraint
 */

namespace Ergebnis\VersionConstraint\Test\DataGenerator\Composer;

use Ergebnis\DataGenerator;

/**
 * @see https://getcomposer.org/doc/articles/versions.md#hyphenated-version-range-
 */
final class HyphenatedVersionRangeGenerator implements DataGenerator\StringGenerator
{
    private readonly ExactVersionConstraintGenerator $exactVersionConstraintGenerator;

    public function __construct()
    {
        $this->exactVersionConstraintGenerator = new ExactVersionConstraintGenerator();
    }

    public function generate(): \Generator
    {
        foreach ($this->exactVersionConstraintGenerator->generate() as $leftExactVersionConstraint) {
            foreach ($this->exactVersionConstraintGenerator->generate() as $rightExactVersionConstraint) {
                yield \sprintf(
                    '%s - %s',
                    $leftExactVersionConstraint,
                    $rightExactVersionConstraint,
                );
            }
        }
    }
}
