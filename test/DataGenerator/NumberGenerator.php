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

namespace Ergebnis\VersionConstraint\Test\DataGenerator;

use Ergebnis\DataGenerator;

final class NumberGenerator implements DataGenerator\StringGenerator
{
    private readonly DataGenerator\StringGenerator $valueGenerator;

    public function __construct()
    {
        $this->valueGenerator = new DataGenerator\ValueGenerator(
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
