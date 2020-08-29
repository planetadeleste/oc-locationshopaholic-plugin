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
    public function active()
    {
        $arResultIDList = TownListStore::instance()->active->get();

        return $this->intersect($arResultIDList);
    }

    /**
     * Sort list by
     * @param string $sSorting
     * @return $this
     */
    public function sort(string $sSorting)
    {
        $arResultIDList = TownListStore::instance()->sorting->get($sSorting);

        return $this->applySorting($arResultIDList);
    }
}
