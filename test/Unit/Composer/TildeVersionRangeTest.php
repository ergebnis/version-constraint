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

namespace Ergebnis\VersionConstraint\Test\Unit\Composer;

use Ergebnis\VersionConstraint\Composer;
use Ergebnis\VersionConstraint\Test;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Composer\TildeVersionRange::class)]
#[Framework\Attributes\UsesClass(Composer\Exception\InvalidTildeVersionRange::class)]
final class TildeVersionRangeTest extends Framework\TestCase
{
    use Test\Util\Helper;

    #[Framework\Attributes\DataProviderExternal(Test\DataProvider\Composer\CaretVersionRangeProvider::class, 'valid')]
    #[Framework\Attributes\DataProviderExternal(Test\DataProvider\Composer\ExactVersionConstraintProvider::class, 'valid')]
    #[Framework\Attributes\DataProviderExternal(Test\DataProvider\Composer\GreaterThanOrEqualVersionRangeProvider::class, 'valid')]
    #[Framework\Attributes\DataProviderExternal(Test\DataProvider\Composer\GreaterThanVersionRangeProvider::class, 'valid')]
    #[Framework\Attributes\DataProviderExternal(Test\DataProvider\Composer\HyphenatedVersionRangeProvider::class, 'valid')]
    #[Framework\Attributes\DataProviderExternal(Test\DataProvider\Composer\LessThanOrEqualVersionRangeProvider::class, 'valid')]
    #[Framework\Attributes\DataProviderExternal(Test\DataProvider\Composer\LessThanVersionRangeProvider::class, 'valid')]
    #[Framework\Attributes\DataProviderExternal(Test\DataProvider\Composer\WildCardVersionRangeProvider::class, 'valid')]
    public function testFromStringRejectsInvalidValue(string $value): void
    {
        $this->expectException(Composer\Exception\InvalidTildeVersionRange::class);

        Composer\TildeVersionRange::fromString($value);
    }

    #[Framework\Attributes\DataProviderExternal(Test\DataProvider\Composer\TildeVersionRangeProvider::class, 'valid')]
    public function testFromStringReturnsTildeVersionRange(string $value): void
    {
        $versionConstraint = Composer\TildeVersionRange::fromString($value);

        self::assertSame($value, $versionConstraint->toString());
    }
}
