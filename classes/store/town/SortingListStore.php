<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Town;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use PlanetaDelEste\ApiToolbox\Traits\Store\SortingListTrait;
use VojtaSvoboda\LocationTown\Models\Town;
use PlanetaDelEste\LocationShopaholic\Classes\Store\TownListStore;

/**
 * Class SortingListStore
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store\Town
 */
class SortingListStore extends AbstractStoreWithParam
{
    use SortingListTrait;

    protected static $instance;

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Town::class;
    }
}
