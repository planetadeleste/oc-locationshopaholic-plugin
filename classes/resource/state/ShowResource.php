<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\State;

use PlanetaDelEste\ApiToolbox\Plugin;

/**
 * Class ShowResource
 *
 * @mixin \PlanetaDelEste\LocationShopaholic\Classes\Item\StateItem
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\State
 */
class ShowResource extends ItemResource
{
    public function getDataKeys()
    {
        return [
            'id',
            'country_id',
            'name',
            'code',
            'country',
            'towns'
        ];
    }

    protected function getEvent()
    {
        return Plugin::EVENT_SHOWRESOURCE_DATA;
    }
}

