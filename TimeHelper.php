<?php

namespace Piwik\Plugins\OddEvenVisit;

class TimeHelper
{
    /**
     * @param string $segment
     * @return int
     */
    public function getHourFromSegment($segment)
    {
        $hour = preg_replace('/[^0-9]/', '', $segment);
        return (int)$hour;
    }

    /**
     * @param int $number
     * @return bool
     */
    public function isEven($number)
    {
        return $number % 2 === 0;
    }
}