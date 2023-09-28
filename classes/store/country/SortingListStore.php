<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Country;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use PlanetaDelEste\ApiToolbox\Traits\Store\SortingListTrait;
use RainLab\Location\Models\Country;

/**
 * Class SortingListStore
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store\Country
 */
class SortingListStore extends AbstractStoreWithParam
{
    use SortingListTrait;

    protected static $instance;

    public $arListFromDB = ['is_pinned', 'name'];

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Country::class;
    }
}
