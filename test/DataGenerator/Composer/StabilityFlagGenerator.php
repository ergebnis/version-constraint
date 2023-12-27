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

final class StabilityFlagGenerator implements Test\DataGenerator\StringGenerator
{
    private readonly Test\DataGenerator\ValueGenerator $valueGenerator;

    public function __construct()
    {
        $this->valueGenerator = new Test\DataGenerator\ValueGenerator(
            'alpha',
            'beta',
            'rc',
            'RC',
            'stable',
        );
    }

    public function generate(): \Generator
    {
        foreach ($this->valueGenerator->generate() as $stabilityFlag) {
            yield $stabilityFlag;
        }
    }
}
