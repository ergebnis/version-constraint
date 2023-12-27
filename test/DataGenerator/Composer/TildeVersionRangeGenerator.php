<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/version-constraint
 */

namespace Ergebnis\VersionConstraint\Test\DataGenerator\Composer;

use Ergebnis\VersionConstraint\Test;

/**
 * @see https://getcomposer.org/doc/articles/versions.md#tilde-version-range-
 * @see https://github.com/composer/semver/blob/3.4.0/tests/VersionParserTest.php#L430-L453
 */
final class TildeVersionRangeGenerator implements Test\DataGenerator\StringGenerator
{
    private readonly Test\DataGenerator\StringGenerator $generator;

    public function __construct()
    {
        $this->generator = new Test\DataGenerator\PrefixingGenerator(
            new Test\DataGenerator\ValueGenerator('~'),
            new Test\DataGenerator\AggregateGenerator(
                /**
                 * @see https://github.com/composer/semver/blob/3.4.0/tests/VersionParserTest.php#L433-L438
                 */
                new Test\DataGenerator\Composer\ExactVersionConstraintGenerator(),
                /**
                 * @see https://github.com/composer/semver/blob/3.4.0/tests/VersionParserTest.php#L439
                 * @see https://github.com/composer/semver/blob/3.4.0/tests/VersionParserTest.php#L442-L443
                 * @see https://github.com/composer/semver/blob/3.4.0/tests/VersionParserTest.php#L445-L447
                 * @see https://github.com/composer/semver/blob/3.4.0/src/VersionParser.php#L39
                 */
                new Test\DataGenerator\SuffixingGenerator(
                    new Test\DataGenerator\Composer\ExactVersionConstraintGenerator(),
                    new Test\DataGenerator\SuffixingGenerator(
                        new Test\DataGenerator\ValueGenerator(
                            '',
                            '-',
                            '.',
                            '_',
                        ),
                        new Test\DataGenerator\ValueGenerator(
                            'a',
                            'alpha',
                            'b',
                            'beta',
                            'dev',
                            'p',
                            'patch',
                            'pl',
                            'rc',
                            'RC',
                            'stable',
                        ),
                    ),
                ),
                new Test\DataGenerator\SuffixingGenerator(
                    new Test\DataGenerator\Composer\ExactVersionConstraintGenerator(),
                    new Test\DataGenerator\AffixingGenerator(
                        new Test\DataGenerator\ValueGenerator(
                            '',
                            '-',
                            '.',
                            '_',
                        ),
                        new Test\DataGenerator\ValueGenerator(
                            'a',
                            'alpha',
                            'b',
                            'beta',
                            'p',
                            'patch',
                            'pl',
                            'rc',
                            'RC',
                            'stable',
                        ),
                        new Test\DataGenerator\PrefixingGenerator(
                            new Test\DataGenerator\ValueGenerator(
                                '',
                                '.',
                                '-',
                            ),
                            new Test\DataGenerator\NumberGenerator(),
                        ),
                    ),
                ),
                /**
                 * @see https://github.com/composer/semver/blob/3.4.0/tests/VersionParserTest.php#L448-L451
                 */
                new VersionLikeBranchGenerator(),
            ),
        );
    }

    public function generate(): \Generator
    {
        foreach ($this->generator->generate() as $tildeVersionConstraint) {
            yield $tildeVersionConstraint;
        }
    }

    private static function foo(): array
    {
        $devFlags = [
            'dev',
        ];

        $appendDevFlag = static function (array $previousValues) use ($devFlags): array {
            $appended = [];

            foreach ($previousValues as $otherValue) {
                foreach ($devFlags as $devFlag) {
                    $appended[] = \sprintf(
                        '%s-%s',
                        $otherValue,
                        $devFlag,
                    );
                }
            }

            return $appended;
        };

        $valuesWithMajorAndDevFlag = $appendDevFlag($valuesWithMajor);
        $valuesWithMajorMinorAndDevFlag = $appendDevFlag($valuesWithMajorAndMinor);
        $valuesWithMajorMinorPatchAndDevFlag = $appendDevFlag($valuesWithMajorMinorAndPatch);
        $valuesWithMajorMinorPatchFourthAndDevFlag = $appendDevFlag($valuesWithMajorMinorPatchAndFourth);

        $stabilityFlags = self::stabilityFlags();

        $appendStabilityFlag = static function (array $previousValues) use ($stabilityFlags): array {
            $appended = [];

            foreach ($previousValues as $otherValue) {
                foreach ($stabilityFlags as $stabilityFlag) {
                    $appended[] = \sprintf(
                        '%s-%s',
                        $otherValue,
                        $stabilityFlag,
                    );
                }
            }

            return $appended;
        };

        $valuesWithMajorAndStabilityFlag = $appendStabilityFlag($valuesWithMajor);
        $valuesWithMajorMinorAndStabilityFlag = $appendStabilityFlag($valuesWithMajorAndMinor);
        $valuesWithMajorMinorPatchAndStabilityFlag = $appendStabilityFlag($valuesWithMajorMinorAndPatch);
        $valuesWithMajorMinorPatchFourthAndStabilityFlag = $appendStabilityFlag($valuesWithMajorMinorPatchAndFourth);

        $preReleaseNumbers = self::numbers();

        $appendPreReleaseNumber = static function (array $previousValues) use ($preReleaseNumbers): array {
            $appended = [];

            foreach ($previousValues as $otherValue) {
                foreach ($preReleaseNumbers as $preReleaseNumber) {
                    $appended[] = \sprintf(
                        '%s.%s',
                        $otherValue,
                        $preReleaseNumber,
                    );
                }
            }

            return $appended;
        };

        $valuesWithMajorStabilityFlagAndPreReleaseNumber = $appendPreReleaseNumber($valuesWithMajorAndStabilityFlag);
        $valuesWithMajorMinorStabilityFlagAndPreReleaseNumber = $appendPreReleaseNumber($valuesWithMajorMinorAndStabilityFlag);
        $valuesWithMajorMinorPatchStabilityFlagAndPreReleaseNumber = $appendPreReleaseNumber($valuesWithMajorMinorPatchAndStabilityFlag);
        $valuesWithMajorMinorPatchFourthStabilityFlagAndPreReleaseNumber = $appendPreReleaseNumber($valuesWithMajorMinorPatchFourthAndStabilityFlag);

        return \array_merge(
            $valuesWithMajor,
            $valuesWithMajorAndMinor,
            $valuesWithMajorMinorAndPatch,
            $valuesWithMajorMinorPatchAndFourth,
            $valuesWithMajorAndDevFlag,
            $valuesWithMajorMinorAndDevFlag,
            $valuesWithMajorMinorPatchAndDevFlag,
            $valuesWithMajorMinorPatchFourthAndDevFlag,
            $valuesWithMajorAndStabilityFlag,
            $valuesWithMajorMinorAndStabilityFlag,
            $valuesWithMajorMinorPatchAndStabilityFlag,
            $valuesWithMajorMinorPatchFourthAndStabilityFlag,
            $valuesWithMajorStabilityFlagAndPreReleaseNumber,
            $valuesWithMajorMinorStabilityFlagAndPreReleaseNumber,
            $valuesWithMajorMinorPatchStabilityFlagAndPreReleaseNumber,
            $valuesWithMajorMinorPatchFourthStabilityFlagAndPreReleaseNumber,
        );
    }

    /**
     * @return list<string>
     */
    private static function numbers(): array
    {
        return [
            '0',
            '1',
            '999',
        ];
    }

    /**
     * @return list<string>
     */
    private static function stabilityFlags(): array
    {
        return [
            'alpha',
            'beta',
            'rc',
            'RC',
            'stable',
        ];
    }
}
