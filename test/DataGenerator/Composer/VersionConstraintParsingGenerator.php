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

use Composer\Semver;
use Ergebnis\DataGenerator;

final class VersionConstraintParsingGenerator implements DataGenerator\StringGenerator
{
    private readonly Semver\VersionParser $versionParser;

    public function __construct(private readonly DataGenerator\StringGenerator $versionConstraintGenerator)
    {
        $this->versionParser = new Semver\VersionParser();
    }

    public function generate(): \Generator
    {
        foreach ($this->versionConstraintGenerator->generate() as $versionConstraint) {
            try {
                $this->versionParser->parseConstraints($versionConstraint);
            } catch (\RuntimeException) {
                throw new \RuntimeException(\sprintf(
                    'Version "%s" does not appear to be valid according to composer/semver.',
                    $versionConstraint,
                ));
            }

            yield $versionConstraint;
        }
    }
}
