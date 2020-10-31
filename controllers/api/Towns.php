<?php namespace PlanetaDelEste\LocationShopaholic\Controllers\Api;

use PlanetaDelEste\ApiToolbox\Classes\Api\Base;
use PlanetaDelEste\LocationShopaholic\Classes\Store\TownListStore;
use VojtaSvoboda\LocationTown\Models\Town;

/**
 * Class Towns
 *
 * @package PlanetaDelEste\LocationShopaholic\Controllers\Api
 */
class Towns extends Base
{
    public $sortColumn = TownListStore::SORT_CREATED_AT_DESC;

    public function getModelClass()
    {
        return Town::class;
    }
}
