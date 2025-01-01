<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/version-constraint
 */

namespace Ergebnis\VersionConstraint\Composer;

final class TildeVersionRange
{
    private const REGEX = <<<'PCRE'
/^
~

v?

(
    # classic version with up to four parts
    (
        (0|[1-9]\d*)(\.(0|[1-9]\d*)){0,3}
    ) |

    # classic version with up to four parts, optional separator, and stability flag
    (
        (0|[1-9]\d*)(\.(0|[1-9]\d*)){0,3}[-._]?(a|alpha|b|beta|dev|p|patch|pl|rc|RC|stable)
    ) |

    # classic version with up to four parts, optional separator, stability flag (except "dev"), optional separator, and build number
    (
        (0|[1-9]\d*)(\.(0|[1-9]\d*)){0,3}[-._]?(a|alpha|b|beta|p|patch|pl|rc|RC|stable)[.-]?\d+
    ) |

    # version-like branch
    (
        (0|[1-9]\d*)(\.(0|[1-9]\d*)){0,2}\.[xX][-._]?dev
    )
)
$/xJ
PCRE;

    private function __construct(private readonly string $value)
    {
    }

    /**
     * @throws Exception\InvalidTildeVersionRange
     */
    public static function fromString(string $value): self
    {
        if (1 !== \preg_match(self::REGEX, $value)) {
            throw Exception\InvalidTildeVersionRange::fromString($value);
        }

        return new self($value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
