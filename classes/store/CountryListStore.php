<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Country\ActiveListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Country\DefaultListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Country\SortingListStore;

/**
 * Class CountryListStore
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store
 *
 * @property SortingListStore $sorting
 * @property ActiveListStore  $active
 * @property DefaultListStore $default
 */
class CountryListStore extends AbstractListStore
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
        $this->addToStoreList('default', DefaultListStore::class);
    }
}
