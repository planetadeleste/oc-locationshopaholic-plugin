<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\State;

/**
 * Class ShowResource
 *
 * @mixin \PlanetaDelEste\LocationShopaholic\Classes\Item\StateItem
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\State
 */
class ShowResource extends ItemResource
{
    public function getDataKeys(): array
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
}

