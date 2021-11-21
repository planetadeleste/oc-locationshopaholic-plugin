<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\Country;

/**
 * Class ShowResource
 *
 * @mixin \PlanetaDelEste\LocationShopaholic\Classes\Item\CountryItem
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\Country
 */
class ShowResource extends ItemResource
{
    public function getDataKeys(): array
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
}

