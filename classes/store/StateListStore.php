<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\State\ActiveListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\State\CountryListStore as StateCountryListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\State\DefaultListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\State\SearchListStore;
use PlanetaDelEste\LocationShopaholic\Classes\Store\State\SortingListStore;

/**
 * Class StateListStore
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Store
 *
 * @property SortingListStore      $sorting
 * @property DefaultListStore      $default
 * @property StateCountryListStore $country
 * @property SearchListStore       $search
 * @property ActiveListStore       $active
 */
class StateListStore extends AbstractListStore
{
    const SORT_NAME_ASC  = 'name|asc';
    const SORT_NAME_DESC = 'name|desc';

    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('sorting', SortingListStore::class);
        $this->addToStoreList('default', DefaultListStore::class);
        $this->addToStoreList('country', StateCountryListStore::class);
        $this->addToStoreList('search', SearchListStore::class);
        $this->addToStoreList('active', ActiveListStore::class);
    }
}
