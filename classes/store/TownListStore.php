<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Town\ActiveListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Town\SearchListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Town\SortingListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Town\StateListStore as StateListStoreTown;

/**
 * Class TownListStore
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store
 *
 * @property SortingListStore   $sorting
 * @property ActiveListStore    $active
 * @property StateListStoreTown $state
 * @property SearchListStore    $search
 */
class TownListStore extends AbstractListStore
{
    const SORT_CREATED_AT_ASC  = 'created_at|asc';
    const SORT_CREATED_AT_DESC = 'created_at|desc';
    const SORT_NAME_AT_ASC  = 'name|asc';
    const SORT_NAME_AT_DESC = 'name|desc';

    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('sorting', SortingListStore::class);
        $this->addToStoreList('active', ActiveListStore::class);
        $this->addToStoreList('state', StateListStoreTown::class);
        $this->addToStoreList('search', SearchListStore::class);
    }
}
