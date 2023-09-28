<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Event\Country;

use Lovata\Toolbox\Classes\Event\ModelHandler;
use PlanetaDelEste\ApiToolbox\Traits\Event\ModelHandlerTrait;
use RainLab\Location\Models\Country;
use PlanetaDelEste\LocationShopaholic\Classes\Item\CountryItem;
use PlanetaDelEste\LocationShopaholic\Classes\Store\CountryListStore;

/**
 * Class CountryModelHandler
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Event\Country
 */
class CountryModelHandler extends ModelHandler
{
    use ModelHandlerTrait;

    /** @var Country */
    protected $obElement;

    public function subscribe($obEvent)
    {
        parent::subscribe($obEvent);
        Country::extend(
            function ($obModel) {
                $this->extendModel($obModel);
            }
        );
    }

    /**
     * @param Country $obModel
     */
    protected function extendModel($obModel)
    {
        $obModel->addDynamicMethod(
            'getCachedField',
            function () {
                return [
                    'id',
                    'name',
                    'code',
                    'is_pinned',
                    'is_enabled'
                ];
            }
        );
    }

    /**
     * Get model class name
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return Country::class;
    }

    /**
     * Get item class name
     *
     * @return string
     */
    protected function getItemClass(): string
    {
        return CountryItem::class;
    }

    /**
     * After create event handler
     */
    protected function afterCreate()
    {
        parent::afterCreate();
        $this->clearCache();
    }

    /**
     * After save event handler
     */
    protected function afterSave()
    {
        parent::afterSave();
        $this->clearCache();
    }

    /**
     * After delete event handler
     */
    protected function afterDelete()
    {
        parent::afterDelete();
        $this->clearCache();
    }

    protected function clearCache()
    {
        $this->clearSorting(['is_pinned', 'name']);
        CountryListStore::instance()->active->clear();
        CountryListStore::instance()->default->clear();
    }

    protected function getStoreClass(): string
    {
        return CountryListStore::class;
    }
}
