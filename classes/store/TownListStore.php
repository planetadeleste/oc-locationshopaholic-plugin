<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Town\ActiveListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Town\SortingListStore;

/**
 * Class TownListStore
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store
 *
 * @property SortingListStore $sorting
 * @property ActiveListStore  $active
 */
class TownListStore extends AbstractListStore
{
    const SORT_CREATED_AT_ASC = 'created_at|asc';
    const SORT_CREATED_AT_DESC = 'created_at|desc';

    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('sorting', SortingListStore::class);
        $this->addToStoreList('active', ActiveListStore::class);
    }
}
