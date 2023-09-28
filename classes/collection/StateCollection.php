<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Collection;

use Lovata\Toolbox\Classes\Collection\ElementCollection;
use PlanetaDelEste\LocationShopaholic\Classes\Item\StateItem;
use PlanetaDelEste\LocationShopaholic\Classes\Store\StateListStore;

/**
 * Class StateCollection
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Collection
 */
class StateCollection extends ElementCollection
{
    const ITEM_CLASS = StateItem::class;

    /**
     * Sort list by
     *
     * @param string $sSorting
     *
     * @return $this
     */
    public function sort(string $sSorting): self
    {
        $arResultIDList = StateListStore::instance()->sorting->get($sSorting);

        return $this->applySorting($arResultIDList);
    }

    /**
     * @return $this
     */
    public function default(): self
    {
        $arResultIDList = StateListStore::instance()->default->get();

        return $this->intersect($arResultIDList);
    }

    /**
     * @return $this
     */
    public function active(): self
    {
        $arResultIDList = StateListStore::instance()->active->get();

        return $this->intersect($arResultIDList);
    }

    /**
     * @param mixed $sValue
     *
     * @return $this
     */
    public function filter($sValue): self
    {
        $arResultIDList = StateListStore::instance()->search->getNoCache($sValue);

        return $this->intersect($arResultIDList);
    }

    /**
     * @param int|string $iCountryId
     *
     * @return $this
     */
    public function country($iCountryId): self
    {
        $arResultIDList = StateListStore::instance()->country->get($iCountryId);

        return $this->intersect($arResultIDList);
    }
}
