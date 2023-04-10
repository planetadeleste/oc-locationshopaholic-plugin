<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Collection;

use Lovata\Toolbox\Classes\Collection\ElementCollection;
use PlanetaDelEste\LocationShopaholic\Classes\Item\TownItem;
use PlanetaDelEste\LocationShopaholic\Classes\Store\TownListStore;

/**
 * Class TownCollection
 * @package PlanetaDelEste\LocationShopaholic\Classes\Collection
 */
class TownCollection extends ElementCollection
{
    const ITEM_CLASS = TownItem::class;

    /**
     * Apply filter by active field
     * @return $this
     */
    public function active(): TownCollection
    {
        $arResultIDList = TownListStore::instance()->active->get();

        return $this->intersect($arResultIDList);
    }

    /**
     * @param mixed $sValue
     *
     * @return $this
     */
    public function filter($sValue): TownCollection
    {
        $arResultIDList = TownListStore::instance()->search->getNoCache($sValue);

        return $this->intersect($arResultIDList);
    }

    /**
     * Sort list by
     * @param string $sSorting
     * @return $this
     */
    public function sort(string $sSorting): TownCollection
    {
        $arResultIDList = TownListStore::instance()->sorting->get($sSorting);

        return $this->applySorting($arResultIDList);
    }

    /**
     * @param int $iStateID
     *
     * @return TownCollection
     */
    public function state(int $iStateID): TownCollection
    {
        $arResultIDList = TownListStore::instance()->state->get($iStateID);

        return $this->intersect($arResultIDList);
    }
}
