<?php declare(strict_types=1);
/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2019 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace Yasumi\tests\Austria\Carinthia;

use DateTime;
use Exception;
use ReflectionException;
use Yasumi\Holiday;
use Yasumi\tests\YasumiTestCaseInterface;

/**
 * Class for testing Plebiscite Day in Carinthia (Austria).
 */
class PlebisciteDayTest extends CarinthiaBaseTestCase implements YasumiTestCaseInterface
{
    /**
     * The name of the holiday.
     */
    public const HOLIDAY = 'plebisciteDay';

    /**
     * Tests Plebiscite Day.
     *
     * @dataProvider PlebisciteDayDataProvider
     *
     * @param int $year the year for which Plebiscite Day needs to be tested.
     * @param DateTime $expected the expected date.
     *
     * @throws ReflectionException
     */
    public function testPlebisciteDay($year, $expected)
    {
        $this->assertHoliday(self::REGION, self::HOLIDAY, $year, $expected);
    }

    /**
     * Returns a list of random test dates used for assertion of Plebiscite Day.
     *
     * @return array list of test dates for Plebiscite Day.
     * @throws Exception
     */
    public function PlebisciteDayDataProvider(): array
    {
        return $this->generateRandomDates(10, 10, self::TIMEZONE);
    }

    /**
     * Tests translated name of the holiday defined in this test.
     * @throws ReflectionException
     */
    public function testTranslation(): void
    {
        $this->assertTranslatedHolidayName(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(),
            [self::LOCALE => 'Tag der Volksabstimmung']
        );
    }

    /**
     * Tests type of the holiday defined in this test.
     * @throws ReflectionException
     */
    public function testHolidayType(): void
    {
        $this->assertHolidayType(self::REGION, self::HOLIDAY, $this->generateRandomYear(), Holiday::TYPE_OFFICIAL);
    }
}
