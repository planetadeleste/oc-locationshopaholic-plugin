<?php namespace PlanetaDelEste\LocationShopaholic\Controllers\Api;

use PlanetaDelEste\ApiToolbox\Classes\Api\Base;
use PlanetaDelEste\LocationShopaholic\Classes\Store\StateListStore;
use RainLab\Location\Models\State;

/**
 * Class States
 *
 * @package PlanetaDelEste\LocationShopaholic\Controllers\Api
 */
class States extends Base
{
    public $sortColumn = StateListStore::SORT_NAME_ASC;

    public function getModelClass()
    {
        return State::class;
    }
}
