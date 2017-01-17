<?php
/**
 * Piwik - free/libre analytics platform.
 *
 * @link http://piwik.org
 *
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\OddEvenVisit;

use Piwik\DataTable;
use Piwik\DataTable\Row;
use Piwik\Piwik;

/**
 * API for plugin OddEvenVisit.
 *
 * @method static \Piwik\Plugins\OddEvenVisit\API getInstance()
 */
class API extends \Piwik\Plugin\API
{

    /**
     * Another example method that returns a data table.
     *
     * @param int         $idSite
     * @param string      $period
     * @param string      $date
     * @param bool|string $segment
     *
     * @return DataTable
     */
    public function getOddEvenVisit($idSite, $period, $date, $segment = false)
    {

        Piwik::checkUserHasViewAccess($idSite);

        $data = \Piwik\API\Request::processRequest('VisitTime.getVisitInformationPerLocalTime', array(
            'idSite' => $idSite,
            'period' => $period,
            'date' => $date,
            'segment' => $segment,
        ));
        $data->applyQueuedFilters();

        $evenVisits = 0;
        $oddVisits = 0;
        $timeHelper = new TimeHelper();

        foreach ($data->getRows() as $visitRow) {
            $hour = $timeHelper->getHourFromSegment($visitRow->getMetadata('segment'));
            if ($timeHelper->isEven($hour)) {
                $evenVisits += (int) $visitRow->getColumn('nb_visits');
            } else {
                $oddVisits += (int) $visitRow->getColumn('nb_visits');
            }
        }

        $result = new DataTable();

        $result->addRowFromArray(array(Row::COLUMNS => array(
            'label' => 'Uneven',
            'nb_visits' => $oddVisits,
        )));
        $result->addRowFromArray(array(Row::COLUMNS => array(
            'label' => 'Even',
            'nb_visits' => $evenVisits,
        )));

        return $result;
    }
}
