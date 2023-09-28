<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\State;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use PlanetaDelEste\ApiToolbox\Traits\Store\SortingListTrait;
use RainLab\Location\Models\State;
use PlanetaDelEste\LocationShopaholic\Classes\Store\StateListStore;

/**
 * Class SortingListStore
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store\State
 */
class SortingListStore extends AbstractStoreWithParam
{
    use SortingListTrait;

    protected static $instance;

    public $arListFromDB = ['name'];

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return State::class;
    }
}
