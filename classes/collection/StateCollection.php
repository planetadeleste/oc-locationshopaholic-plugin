<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Collection;

use Lovata\Toolbox\Classes\Collection\ElementCollection;
use PlanetaDelEste\LocationShopaholic\Classes\Item\StateItem;
use PlanetaDelEste\LocationShopaholic\Classes\Store\StateListStore;

/**
 * Class StateCollection
 * @package PlanetaDelEste\LocationShopaholic\Classes\Collection
 */
class StateCollection extends ElementCollection
{
    const ITEM_CLASS = StateItem::class;

    /**
     * Sort list by
     * @param string $sSorting
     * @return $this
     */
    public function sort(string $sSorting)
    {
        $arResultIDList = StateListStore::instance()->sorting->get($sSorting);

        return $this->applySorting($arResultIDList);
    }

    /**
     * @return \PlanetaDelEste\LocationShopaholic\Classes\Collection\StateCollection
     */
    public function default()
    {
        $arResultIDList = StateListStore::instance()->default->get();

        return $this->intersect($arResultIDList);
    }
}
