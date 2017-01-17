<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\OddEvenVisit\tests\Unit;

use Piwik\Plugins\OddEvenVisit\TimeHelper;

/**
 * @group OddEvenVisit
 * @group TimeHelperTest
 * @group Plugins
 */
class TimeHelperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @dataProvider segmentProvider
     * @param string $segment
     * @param int $expectedResult
     */
    public function shouldExtractHourFromSegment($segment, $expectedResult)
    {
        $timeHelper = new TimeHelper();
        $this->assertEquals($expectedResult, $timeHelper->getHourFromSegment($segment));
    }
    /**
     * @test
     * @dataProvider evenNumbersProvider
     * @param int $number
     * @param bool $expectedResult
     */
    public function shouldCheckThatNumberIsEven($number, $expectedResult)
    {
        $timeHelper = new TimeHelper();
        $this->assertEquals($expectedResult, $timeHelper->isEven($number));
    }

    /**
     * Data Provider
     * @return array
     */
    public function segmentProvider()
    {
        return [
            ['visitLocalHour==0', 0],
            ['visitLocalHour==1', 1],
            ['visitLocalHour==2', 2],
            ['visitLocalHour==3', 3],
            ['visitLocalHour==4', 4],
            ['visitLocalHour==5', 5],
            ['visitLocalHour==6', 6],
            ['visitLocalHour==7', 7],
            ['visitLocalHour==8', 8],
            ['visitLocalHour==9', 9],
            ['visitLocalHour==10', 10],
            ['visitLocalHour==11', 11],
            ['visitLocalHour==12', 12],
            ['visitLocalHour==13', 13],
            ['visitLocalHour==14', 14],
            ['visitLocalHour==15', 15],
            ['visitLocalHour==16', 16],
            ['visitLocalHour==17', 17],
            ['visitLocalHour==18', 18],
            ['visitLocalHour==19', 19],
            ['visitLocalHour==20', 20],
            ['visitLocalHour==21', 21],
            ['visitLocalHour==22', 22],
            ['visitLocalHour==23', 23],
        ];
    }
    /**
     * Data Provider
     * @return array
     */
    public function evenNumbersProvider()
    {
        return [
            [0, true],
            [1, false],
            [2, true],
            [3, false],
            [4, true],
            [5, false],
            [6, true],
            [7, false],
            [8, true],
            [9, false],
            [10, true],
            [11, false],
            [12, true],
            [13, false],
            [14, true],
            [15, false],
            [16, true],
            [17, false],
            [18, true],
            [19, false],
            [20, true],
            [21, false],
            [22, true],
            [23, false],
        ];
    }
}
