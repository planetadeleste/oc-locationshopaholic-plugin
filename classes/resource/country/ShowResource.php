<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\Country;

use PlanetaDelEste\ApiToolbox\Plugin;

/**
 * Class ShowResource
 *
 * @mixin \PlanetaDelEste\LocationShopaholic\Classes\Item\CountryItem
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\Country
 */
class ShowResource extends ItemResource
{
    public function getDataKeys()
    {
        return [
            'id',
            'name',
            'code',
            'is_enabled',
            'is_pinned',
            'is_default',
            'states'
        ];
    }

    protected function getEvent()
    {
        return Plugin::EVENT_SHOWRESOURCE_DATA;
    }
}

