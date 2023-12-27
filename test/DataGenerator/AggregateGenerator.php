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

final class AggregateGenerator implements StringGenerator
{
    /**
     * @var list<StringGenerator>
     */
    private readonly array $generators;

    public function __construct(StringGenerator ...$generators)
    {
        $this->generators = $generators;
    }

    public function generate(): \Generator
    {
        foreach ($this->generators as $generator) {
            foreach ($generator->generate() as $value) {
                yield $value;
            }
        }
    }
}
