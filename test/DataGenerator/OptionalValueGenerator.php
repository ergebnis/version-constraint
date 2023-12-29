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

final class OptionalValueGenerator implements StringGenerator
{
    /**
     * @var list<string>
     */
    private readonly array $values;

    public function __construct(string ...$values)
    {
        $this->values = $values;
    }

    public function generate(): \Generator
    {
        yield '';

        foreach ($this->values as $value) {
            yield $value;
        }
    }
}
