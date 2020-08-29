<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\State\DefaultListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\State\SortingListStore;

/**
 * Class StateListStore
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store
 *
 * @property SortingListStore $sorting
 * @property DefaultListStore $default
 */
class StateListStore extends AbstractListStore
{
    const SORT_CREATED_AT_ASC  = 'created_at|asc';
    const SORT_CREATED_AT_DESC = 'created_at|desc';

    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('sorting', SortingListStore::class);
        $this->addToStoreList('default', DefaultListStore::class);
    }
}
