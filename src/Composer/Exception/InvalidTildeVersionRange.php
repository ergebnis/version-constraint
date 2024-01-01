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

namespace Ergebnis\VersionConstraint\Composer\Exception;

final class InvalidTildeVersionRange extends \InvalidArgumentException
{
    public static function fromString(string $value): self
    {
        return new self(\sprintf(
            'Value "%s" does not appear to be a valid value.',
            $value,
        ));
    }
}
