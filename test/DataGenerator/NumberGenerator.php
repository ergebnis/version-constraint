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

final class NumberGenerator implements StringGenerator
{
    private readonly ValueGenerator $valueGenerator;

    public function __construct()
    {
        $this->valueGenerator = new ValueGenerator(
            '0',
            '123',
        );
    }

    public function generate(): \Generator
    {
        foreach ($this->valueGenerator->generate() as $number) {
            yield $number;
        }
    }
}
