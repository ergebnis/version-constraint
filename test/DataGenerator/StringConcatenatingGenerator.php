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

final class StringConcatenatingGenerator implements StringGenerator
{
    private readonly StringGenerator $firstGenerator;
    private readonly StringGenerator $secondGenerator;

    /**
     * @throws \InvalidArgumentException
     */
    public function __construct(StringGenerator ...$stringGenerators)
    {
        $count = \count($stringGenerators);

        if (0 === $count) {
            throw new \InvalidArgumentException('Need at least one generator');
        }

        $this->firstGenerator = \array_shift($stringGenerators);

        if (1 === $count) {
            $this->secondGenerator = new ValueGenerator('');

            return;
        }

        if (2 === $count) {
            $this->secondGenerator = \array_shift($stringGenerators);

            return;
        }

        if (2 < $count) {
            $this->secondGenerator = new self(...$stringGenerators);
        }
    }

    public function generate(): \Generator
    {
        foreach ($this->firstGenerator->generate() as $firstValue) {
            foreach ($this->secondGenerator->generate() as $secondValue) {
                yield $firstValue . $secondValue;
            }
        }
    }
}
