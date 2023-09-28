<?php namespace PlanetaDelEste\LocationShopaholic\Controllers\Api;

use PlanetaDelEste\ApiToolbox\Classes\Api\Base;
use PlanetaDelEste\LocationShopaholic\Classes\Store\TownListStore;
use VojtaSvoboda\LocationTown\Models\Town;

/**
 * Class Towns
 *
 * @package PlanetaDelEste\LocationShopaholic\Controllers\Api
 *
 * @property \PlanetaDelEste\LocationShopaholic\Classes\Collection\TownCollection $collection
 */
class Towns extends Base
{
    public $sortColumn = TownListStore::SORT_NAME_AT_ASC;

    public function list()
    {
        if (func_num_args()) {
            $iStateID = func_get_arg(0);
            if (is_numeric($iStateID)) {
                $this->collection->state($iStateID);
            }
        }

        return parent::list();
    }

    public function getModelClass(): string
    {
        return Town::class;
    }
}
