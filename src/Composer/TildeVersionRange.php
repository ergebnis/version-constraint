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
    # classic version with up to four parts
    (
        \d+(\.\d+){0,3}
    ) |

    # classic version with up to four parts, optional separator, and stability flag
    (
        \d+(\.\d+){0,3}[-._]?(a|alpha|b|beta|dev|p|patch|pl|rc|RC|stable)
    ) |

    # classic version with up to four parts, optional separator, stability flag (except "dev"), optional separator, and build number
    (
        \d+(\.\d+){0,3}[-._]?(a|alpha|b|beta|p|patch|pl|rc|RC|stable)[.-]?\d+
    ) |

    # version-like branch
    (
        \d+(\.\d+){0,2}\.[xX][-.]?dev
    )
)
$/xJ
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
