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

namespace Ergebnis\VersionConstraint\Test\Unit\Composer\Exception;

use Ergebnis\VersionConstraint\Composer;
use Ergebnis\VersionConstraint\Test;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Composer\Exception\InvalidTildeVersionRange::class)]
final class InvalidTildeVersionRangeTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testFromStringReturnsException(): void
    {
        $value = self::faker()->word();

        $exception = Composer\Exception\InvalidTildeVersionRange::fromString($value);

        $message = \sprintf(
            'Value "%s" does not appear to be a valid value.',
            $value,
        );

        self::assertSame($message, $exception->getMessage());
    }
}
