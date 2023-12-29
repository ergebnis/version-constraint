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
        $this->generator = new Test\DataGenerator\StringConcatenatingGenerator(
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
                new Test\DataGenerator\StringConcatenatingGenerator(
                    new Test\DataGenerator\Composer\ExactVersionConstraintGenerator(),
                    new Test\DataGenerator\OptionalValueGenerator(
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
                new Test\DataGenerator\StringConcatenatingGenerator(
                    new Test\DataGenerator\Composer\ExactVersionConstraintGenerator(),
                    new Test\DataGenerator\OptionalValueGenerator(
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
                    new Test\DataGenerator\OptionalValueGenerator(
                        '.',
                        '-',
                    ),
                    new Test\DataGenerator\NumberGenerator(),
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
}
