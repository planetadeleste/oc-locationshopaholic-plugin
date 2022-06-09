<?php namespace PlanetaDelEste\LocationShopaholic\Controllers\Api;

use PlanetaDelEste\ApiToolbox\Classes\Api\Base;
use PlanetaDelEste\LocationShopaholic\Classes\Store\StateListStore;
use RainLab\Location\Models\Country;
use RainLab\Location\Models\State;

/**
 * Class States
 *
 * @package PlanetaDelEste\LocationShopaholic\Controllers\Api
 * @property \PlanetaDelEste\LocationShopaholic\Classes\Collection\StateCollection $collection;
 */
class States extends Base
{
    public $sortColumn = StateListStore::SORT_NAME_ASC;

    public function list()
    {
        if (func_num_args()) {
            $iCountryId = func_get_arg(0);
            if (is_numeric($iCountryId)) {
                $this->collection->country($iCountryId);
            }
        }

        return parent::list();
    }

    public function getModelClass(): string
    {
        return State::class;
    }
}
