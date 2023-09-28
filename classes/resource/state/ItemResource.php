<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\State;

use PlanetaDelEste\ApiToolbox\Classes\Resource\Base;
use PlanetaDelEste\LocationShopaholic\Plugin;
use PlanetaDelEste\LocationShopaholic\Classes\Resource\Country\ItemResource as ItemResourceCountry;
use PlanetaDelEste\LocationShopaholic\Classes\Resource\Town\IndexCollection as IndexCollectionTown;

/**
 * Class ItemResource
 *
 * @mixin \PlanetaDelEste\LocationShopaholic\Classes\Item\StateItem
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\State
 */
class ItemResource extends Base
{
    /**
     * @return array|void
     */
    public function getData(): array
    {
        return [
            'country' => ItemResourceCountry::make($this->country),
            'towns'   => IndexCollectionTown::make($this->towns->active()->collect())
        ];
    }

    public function getDataKeys(): array
    {
        return [
            'id',
            'country_id',
            'name',
            'code'
        ];
    }

    protected function getEvent(): string
    {
        return Plugin::EVENT_ITEMRESOURCE_DATA.'.state';
    }
}
