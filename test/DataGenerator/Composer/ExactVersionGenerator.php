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

final class ExactVersionGenerator implements Test\DataGenerator\StringGenerator
{
    private readonly Test\DataGenerator\NumberGenerator $numberGenerator;

    public function __construct()
    {
        $this->numberGenerator = new Test\DataGenerator\NumberGenerator();
    }

    public function generate(): \Generator
    {
        foreach ($this->numberGenerator->generate() as $major) {
            yield $major;

            foreach ($this->numberGenerator->generate() as $minor) {
                yield \sprintf(
                    '%s.%s',
                    $major,
                    $minor,
                );

                foreach ($this->numberGenerator->generate() as $patch) {
                    yield \sprintf(
                        '%s.%s.%s',
                        $major,
                        $minor,
                        $patch,
                    );

                    foreach ($this->numberGenerator->generate() as $fourth) {
                        yield \sprintf(
                            '%s.%s.%s.%s',
                            $major,
                            $minor,
                            $patch,
                            $fourth,
                        );
                    }
                }
            }
        }
    }
}
