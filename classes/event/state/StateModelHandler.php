<?php

namespace PlanetaDelEste\LocationShopaholic\Classes\Event\State;

use Lovata\Toolbox\Classes\Event\ModelHandler;
use PlanetaDelEste\ApiToolbox\Traits\Event\ModelHandlerTrait;
use PlanetaDelEste\LocationShopaholic\Classes\Item\StateItem;
use PlanetaDelEste\LocationShopaholic\Classes\Store\StateListStore;
use RainLab\Location\Models\State;

/**
 * Class StateModelHandler
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Event\State
 */
class StateModelHandler extends ModelHandler
{
    use ModelHandlerTrait;

    /** @var State */
    protected $obElement;

    public function subscribe($obEvent)
    {
        parent::subscribe($obEvent);
        State::extend(
            function ($obModel) {
                $this->extendModel($obModel);
            }
        );
    }

    /**
     * @param State $obModel
     */
    protected function extendModel($obModel)
    {
        $obModel->addDynamicMethod(
            'getCachedField',
            function () {
                return [
                    'id',
                    'country_id',
                    'name',
                    'code',
                    'is_enabled',
                ];
            }
        );
    }

    protected function afterCreate()
    {
        parent::afterCreate();
        $this->clearCache();
    }

    protected function afterSave()
    {
        parent::afterSave();
        $this->clearCache();
    }

    protected function afterDelete()
    {
        parent::afterDelete();
        $this->clearCache();
    }

    /**
     * Get model class name
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return State::class;
    }

    /**
     * Get item class name
     *
     * @return string
     */
    protected function getItemClass(): string
    {
        return StateItem::class;
    }

    protected function clearCache()
    {
        $this->clearSorting(['name']);
        $this->clearCacheFields(['country']);

        StateListStore::instance()->active->clear();
        StateListStore::instance()->default->clear();
    }

    protected function getStoreClass(): string
    {
        return StateListStore::class;
    }
}
