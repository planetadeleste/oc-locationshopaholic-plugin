<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Event\Town;

use Lovata\Toolbox\Classes\Event\ModelHandler;
use PlanetaDelEste\ApiToolbox\Traits\Event\ModelHandlerTrait;
use VojtaSvoboda\LocationTown\Models\Town;
use PlanetaDelEste\LocationShopaholic\Classes\Item\TownItem;
use PlanetaDelEste\LocationShopaholic\Classes\Store\TownListStore;

/**
 * Class TownModelHandler
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Event\Town
 */
class TownModelHandler extends ModelHandler
{
    use ModelHandlerTrait;

    /** @var Town */
    protected $obElement;

    public function subscribe($obEvent)
    {
        parent::subscribe($obEvent);
        Town::extend(
            function ($obModel) {
                $this->extendModel($obModel);
            }
        );
    }

    /**
     * @param Town $obModel
     */
    protected function extendModel($obModel)
    {
        $obModel->addDynamicMethod(
            'getCachedField',
            function () {
                return [
                    'id',
                    'state_id',
                    'name',
                    'slug',
                    'description',
                    'is_enabled'
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

    protected function clearCache()
    {
        $this->clearSorting(['name', 'created_at']);
        $this->clearCacheFields(['state']);
        TownListStore::instance()->active->clear();
    }

    /**
     * Get model class name
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return Town::class;
    }

    /**
     * Get item class name
     *
     * @return string
     */
    protected function getItemClass(): string
    {
        return TownItem::class;
    }

    protected function getStoreClass(): string
    {
        return TownListStore::class;
    }
}
