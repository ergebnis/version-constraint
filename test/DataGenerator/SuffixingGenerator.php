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

namespace Ergebnis\VersionConstraint\Test\DataGenerator;

final class SuffixingGenerator implements StringGenerator
{
    public function __construct(
        private readonly StringGenerator $valueGenerator,
        private readonly StringGenerator $suffixGenerator,
    ) {
    }

    public function generate(): \Generator
    {
        foreach ($this->valueGenerator->generate() as $value) {
            foreach ($this->suffixGenerator->generate() as $suffix) {
                yield \sprintf(
                    '%s%s',
                    $value,
                    $suffix,
                );
            }
        }
    }
}
