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

/**
 * @see https://getcomposer.org/doc/articles/versions.md#branches
 */
final class VersionLikeBranchGenerator implements Test\DataGenerator\StringGenerator
{
    private readonly Test\DataGenerator\NumberGenerator $numberGenerator;
    private readonly Test\DataGenerator\StringGenerator $suffixGenerator;

    public function __construct()
    {
        $this->numberGenerator = new Test\DataGenerator\NumberGenerator();
        $this->suffixGenerator = new Test\DataGenerator\AffixingGenerator(
            new Test\DataGenerator\PrefixingGenerator(
                new Test\DataGenerator\ValueGenerator('.'),
                new Test\DataGenerator\ValueGenerator(
                    'x',
                    'X',
                ),
            ),
            new Test\DataGenerator\ValueGenerator(
                '',
                '-',
                '.',
            ),
            new Test\DataGenerator\ValueGenerator('dev'),
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
