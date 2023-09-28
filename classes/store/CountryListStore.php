<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Country\ActiveListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Country\DefaultListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Country\SearchListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\Country\SortingListStore;

/**
 * Class CountryListStore
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store
 *
 * @property SortingListStore $sorting
 * @property ActiveListStore  $active
 * @property DefaultListStore $default
 * @property SearchListStore  $search
 */
class CountryListStore extends AbstractListStore
{
    const SORT_NAME_ASC  = 'name|asc';
    const SORT_NAME_DESC = 'name|desc';
    const SORT_PINNED_ASC  = 'is_pinned|asc';
    const SORT_PINNED_DESC = 'is_pinned|desc';

    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('sorting', SortingListStore::class);
        $this->addToStoreList('active', ActiveListStore::class);
        $this->addToStoreList('default', DefaultListStore::class);
        $this->addToStoreList('search', SearchListStore::class);
    }
}
