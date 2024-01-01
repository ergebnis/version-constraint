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
use Ergebnis\VersionConstraint\Test;

/**
 * @see https://getcomposer.org/doc/articles/versions.md#branches
 */
final class VersionLikeBranchGenerator implements DataGenerator\StringGenerator
{
    private readonly Test\DataGenerator\NumberGenerator $numberGenerator;
    private readonly DataGenerator\StringGenerator $suffixGenerator;

    public function __construct()
    {
        $this->numberGenerator = new Test\DataGenerator\NumberGenerator();
        $this->suffixGenerator = new DataGenerator\ConcatenatingValueGenerator(
            new DataGenerator\ValueGenerator('.'),
            new DataGenerator\ValueGenerator(
                'x',
                'X',
            ),
            new DataGenerator\OptionalValueGenerator(
                '-',
                '.',
            ),
            new DataGenerator\ValueGenerator('dev'),
        );
    }

    public function generate(): \Generator
    {
        foreach ($this->suffixGenerator->generate() as $suffix) {
            foreach ($this->numberGenerator->generate() as $major) {
                yield \sprintf(
                    '%s%s',
                    $major,
                    $suffix,
                );

                foreach ($this->numberGenerator->generate() as $minor) {
                    yield \sprintf(
                        '%s.%s%s',
                        $major,
                        $minor,
                        $suffix,
                    );

                    foreach ($this->numberGenerator->generate() as $patch) {
                        yield \sprintf(
                            '%s.%s.%s%s',
                            $major,
                            $minor,
                            $patch,
                            $suffix,
                        );
                    }
                }
            }
        }
    }
}
