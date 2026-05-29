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

namespace Ergebnis\VersionConstraint\Test\DataProvider\Composer;

use Composer\Semver;

abstract class AbstractDataProvider
{
    /**
     * @param array<string, string> $values
     *
     * @return \Generator<string, array{0: string}>
     */
    final protected static function provideValues(array $values): \Generator
    {
        $versionParser = new Semver\VersionParser();

        foreach ($values as $key => $value) {
            try {
                $versionParser->parseConstraints($value);
            } catch (\UnexpectedValueException $exception) {
                throw new \RuntimeException(\sprintf(
                    'Value "%s" does not appear to be valid according to composer/semver.',
                    $value,
                ), 0, $exception);
            }

            yield $key => [
                $value,
            ];
        }
    }
}
