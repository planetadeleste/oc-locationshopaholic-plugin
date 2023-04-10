<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Collection;

use Lovata\Toolbox\Classes\Collection\ElementCollection;
use PlanetaDelEste\LocationShopaholic\Classes\Item\CountryItem;
use PlanetaDelEste\LocationShopaholic\Classes\Store\CountryListStore;

/**
 * Class CountryCollection
 * @package PlanetaDelEste\LocationShopaholic\Classes\Collection
 */
class CountryCollection extends ElementCollection
{
    const ITEM_CLASS = CountryItem::class;

    /**
     * Sort list by
     * @param string $sSorting
     * @return $this
     */
    public function sort(string $sSorting): self
    {
        $arResultIDList = CountryListStore::instance()->sorting->get($sSorting);

        return $this->applySorting($arResultIDList);
    }

    /**
     * @return CountryCollection
     */
    public function active(): self
    {
        $arResultIDList = CountryListStore::instance()->active->get();

        return $this->intersect($arResultIDList);
    }

    /**
     * @param mixed $sValue
     * @return CountryCollection
     */
    public function filter($sValue): self
    {
        $arResultIDList = CountryListStore::instance()->search->getNoCache($sValue);

        return $this->intersect($arResultIDList);
    }

    /**
     * @return CountryCollection
     */
    public function default(): self
    {
        $arResultIDList = CountryListStore::instance()->default->get();

        return $this->intersect($arResultIDList);
    }
}
