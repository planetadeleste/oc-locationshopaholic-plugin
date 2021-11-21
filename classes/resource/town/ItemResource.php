<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\Town;

use PlanetaDelEste\ApiToolbox\Classes\Resource\Base;
use PlanetaDelEste\LocationShopaholic\Plugin;
use PlanetaDelEste\LocationShopaholic\Classes\Resource\State\ItemResource as ItemResourceState;

/**
 * Class ItemResource
 *
 * @mixin \PlanetaDelEste\LocationShopaholic\Classes\Item\TownItem
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\Town
 */
class ItemResource extends Base
{
    /**
     * @return array|void
     */
    public function getData(): array
    {
        return [
            'state' => ItemResourceState::make($this->state)
        ];
    }

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
            'deleted_at'
        ];
    }

    protected function getEvent(): string
    {
        return Plugin::EVENT_ITEMRESOURCE_DATA.'.town';
    }
}
