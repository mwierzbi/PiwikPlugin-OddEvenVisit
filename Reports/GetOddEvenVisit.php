<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\OddEvenVisit\Reports;

use Piwik\Piwik;
use Piwik\Plugin\Report;
use Piwik\Plugin\ViewDataTable;

use Piwik\View;

/**
 * This class defines a new report.
 *
 * See {@link http://developer.piwik.org/api-reference/Piwik/Plugin/Report} for more information.
 */
class GetOddEvenVisit extends Base
{
    protected function init()
    {
        parent::init();

        $this->name = Piwik::translate('OddEvenVisit_OddEvenVisit');
        $this->dimension = null;
        $this->documentation = Piwik::translate('');

        // This defines in which order your report appears in the mobile app, in the menu and in the list of widgets
        $this->order = 1;

        $this->metrics = array('nb_visits');
        $this->constantRowsCount = true;

        // If a subcategory is specified, the report will be displayed in the menu under this menu item
        $this->subcategoryId = 'OddEvenVisit_OddEvenVisit';
    }

    /**
     * Here you can configure how your report should be displayed. For instance whether your report supports a search
     * etc. You can also change the default request config. For instance change how many rows are displayed by default.
     *
     * @param ViewDataTable $view
     */
    public function configureView(ViewDataTable $view)
    {
        $view->config->addTranslations(array('label' => 'Times'));

        $view->requestConfig->filter_sort_column = 'nb_visits';
        $view->config->show_limit_control = false;
        $view->config->show_table_all_columns = false;
        $view->config->columns_to_display = array_merge(array('label'), $this->metrics);
    }

    /**
     * Here you can define related reports that will be shown below the reports. Just return an array of related
     * report instances if there are any.
     *
     * @return \Piwik\Plugin\Report[]
     */
    public function getRelatedReports()
    {
        return array(); // eg return array(new XyzReport());
    }


}
