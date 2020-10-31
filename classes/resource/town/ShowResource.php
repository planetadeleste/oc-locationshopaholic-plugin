<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\Town;

use PlanetaDelEste\ApiToolbox\Plugin;

/**
 * Class ShowResource
 *
 * @mixin \VojtaSvoboda\LocationTown\Classes\Item\TownItem
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\Town
 */
class ShowResource extends ItemResource
{
    public function getDataKeys()
    {
        return [
            'id',
            'state_id',
            'name',
            'slug',
            'excerpt',
            'description',
            'is_enabled',
            'created_at',
            'updated_at',
            'deleted_at',
            'state'
        ];
    }

    protected function getEvent()
    {
        return Plugin::EVENT_SHOWRESOURCE_DATA;
    }
}

