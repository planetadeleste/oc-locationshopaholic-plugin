<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\State;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use RainLab\Location\Models\State;
use PlanetaDelEste\LocationShopaholic\Classes\Store\StateListStore;

/**
 * Class SortingListStore
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store\State
 */
class SortingListStore extends AbstractStoreWithParam
{
    protected static $instance;

    /**
     * Get ID list from database
     * @return array
     */
    protected function getIDListFromDB() : array
    {
        $arElementIDList = [];

        if (!$this->sValue) {
            $arElementIDList = $this->getDefaultList();
        } else {
            list($sColumn, $sDirection) = explode("|", $this->sValue);
            if ($sColumn) {
                if (!$sDirection) {
                    $sDirection = 'asc';
                }
                $arElementIDList = State::orderBy($sColumn, $sDirection)->lists('id');
            }
        }

        return $arElementIDList;
    }

    /**
     * Get default list
     * @return array
     */
    protected function getDefaultList() : array
    {
        return (array) State::lists('id');
    }
}
