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

namespace Ergebnis\VersionConstraint\Test\Unit\Composer;

use Ergebnis\VersionConstraint;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\VersionConstraint\Composer\TildeVersionRange
 *
 * @uses \Ergebnis\VersionConstraint\Composer\Exception\InvalidTildeVersionRange
 */
final class TildeVersionRangeTest extends Framework\TestCase
{
    use VersionConstraint\Test\Util\Helper;

    /**
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\CaretVersionRangeProvider::valid
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\ExactVersionConstraintProvider::valid
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\GreaterThanOrEqualVersionRangeProvider::valid
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\GreaterThanVersionRangeProvider::valid
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\HyphenatedVersionRangeProvider::valid
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\LessThanOrEqualVersionRangeProvider::valid
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\LessThanVersionRangeProvider::valid
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\TildeVersionRangeProvider::invalid
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\WildCardVersionRangeProvider::valid
     */
    public function testFromStringRejectsInvalidValue(string $value): void
    {
        $this->expectException(VersionConstraint\Composer\Exception\InvalidTildeVersionRange::class);

        VersionConstraint\Composer\TildeVersionRange::fromString($value);
    }

    /**
     * @dataProvider \Ergebnis\VersionConstraint\Test\DataProvider\Composer\TildeVersionRangeProvider::valid
     */
    public function testFromStringReturnsTildeVersionRange(string $value): void
    {
        $versionConstraint = VersionConstraint\Composer\TildeVersionRange::fromString($value);

        self::assertSame($value, $versionConstraint->toString());
    }
}
