<?php namespace PlanetaDelEste\LocationShopaholic\Controllers\Api;

use PlanetaDelEste\ApiToolbox\Classes\Api\Base;
use PlanetaDelEste\LocationShopaholic\Classes\Store\CountryListStore;
use RainLab\Location\Models\Country;

/**
 * Class Countries
 *
 * @package PlanetaDelEste\LocationShopaholic\Controllers\Api
 */
class Countries extends Base
{
    public $sortColumn = CountryListStore::SORT_NAME_ASC;

    public function getModelClass(): string
    {
        return Country::class;
    }
}
