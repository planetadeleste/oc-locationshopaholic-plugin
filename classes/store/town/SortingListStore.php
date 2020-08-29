<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Town;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use VojtaSvoboda\LocationTown\Models\Town;
use PlanetaDelEste\LocationShopaholic\Classes\Store\TownListStore;

/**
 * Class SortingListStore
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store\Town
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
                $arElementIDList = Town::orderBy($sColumn, $sDirection)->lists('id');
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
        return (array) Town::lists('id');
    }
}
