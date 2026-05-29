<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/version-constraint
 */

namespace Ergebnis\VersionConstraint\Test\DataGenerator\Composer;

use Ergebnis\DataGenerator;
use Ergebnis\VersionConstraint;

/**
 * @see https://getcomposer.org/doc/articles/versions.md#wildcard-version-range-
 */
final class WildCardVersionRangeGenerator implements DataGenerator\StringGenerator
{
    private readonly VersionConstraint\Test\DataGenerator\NumberGenerator $numberGenerator;

    public function __construct()
    {
        $this->numberGenerator = new VersionConstraint\Test\DataGenerator\NumberGenerator();
    }

    public function generate(): \Generator
    {
        yield '*';

        foreach ($this->numberGenerator->generate() as $major) {
            yield \sprintf(
                '%s.*',
                $major,
            );

            foreach ($this->numberGenerator->generate() as $minor) {
                yield \sprintf(
                    '%s.%s.*',
                    $major,
                    $minor,
                );

                foreach ($this->numberGenerator->generate() as $patch) {
                    yield \sprintf(
                        '%s.%s.%s.*',
                        $major,
                        $minor,
                        $patch,
                    );
                }
            }
        }
    }
}
