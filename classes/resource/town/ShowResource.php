<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\Town;

/**
 * Class ShowResource
 *
 * @mixin \VojtaSvoboda\LocationTown\Classes\Item\TownItem
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\Town
 */
class ShowResource extends ItemResource
{
    public function getDataKeys(): array
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
}

