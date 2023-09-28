<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\Country;

use PlanetaDelEste\ApiToolbox\Classes\Resource\Base;
use PlanetaDelEste\LocationShopaholic\Plugin;
use PlanetaDelEste\LocationShopaholic\Classes\Resource\State\ListCollection as ListCollectionState;

/**
 * Class ItemResource
 *
 * @mixin \PlanetaDelEste\LocationShopaholic\Classes\Item\CountryItem
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\Country
 */
class ItemResource extends Base
{
    /**
     * @return array|void
     */
    public function getData(): array
    {
        return [
            'states' => ListCollectionState::make($this->states->active()->collect())
        ];
    }

    public function getDataKeys(): array
    {
        return [
            'id',
            'name',
            'code',
            'is_enabled',
            'is_pinned',
            'is_default',
        ];
    }

    protected function getEvent(): string
    {
        return Plugin::EVENT_ITEMRESOURCE_DATA.'.country';
    }
}
