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

namespace Ergebnis\VersionConstraint\Composer;

use Ergebnis\VersionConstraint;

final class TildeVersionRange
{
    private const REGEX = <<<'PCRE'
/^
~

v?

(
    # classic version with up to four parts, an optional stability flag with optional build
    # numbers, and an optional dev flag
    (
        \d+(\.\d+){0,3}[._-]?((stable|beta|b|RC|alpha|a|patch|pl|p)((?:[.-]?\d+)*)?)?([.-]?dev)?
    ) |

    # version-like branch with up to three parts before a wildcard
    (
        \d+(\.\d+){0,2}\.[xX*][.-]?dev
    )
)

# optional build metadata
(\+\S+)?

$/ixJ
PCRE;
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @throws VersionConstraint\Composer\Exception\InvalidTildeVersionRange
     */
    public static function fromString(string $value): self
    {
        if (1 !== \preg_match(self::REGEX, $value)) {
            throw VersionConstraint\Composer\Exception\InvalidTildeVersionRange::fromString($value);
        }

        return new self($value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
