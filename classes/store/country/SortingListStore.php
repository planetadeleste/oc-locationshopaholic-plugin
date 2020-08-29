<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Country;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use RainLab\Location\Models\Country;

/**
 * Class SortingListStore
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store\Country
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
            [$sColumn, $sDirection] = explode("|", $this->sValue);
            if ($sColumn) {
                if (!$sDirection) {
                    $sDirection = 'asc';
                }
                $arElementIDList = Country::orderBy($sColumn, $sDirection)->lists('id');
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
        return Country::orderBy('is_pinned', 'desc')->lists('id');
    }

}
