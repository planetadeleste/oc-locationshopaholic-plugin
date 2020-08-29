<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Event\Country;

use Lovata\Toolbox\Classes\Event\ModelHandler;
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
    protected function getModelClass()
    {
        return Country::class;
    }

    /**
     * Get item class name
     *
     * @return string
     */
    protected function getItemClass()
    {
        return CountryItem::class;
    }

    /**
     * After create event handler
     */
    protected function afterCreate()
    {
        parent::afterCreate();
    }

    /**
     * After save event handler
     */
    protected function afterSave()
    {
        parent::afterSave();
    }

    /**
     * After delete event handler
     */
    protected function afterDelete()
    {
        parent::afterDelete();
    }
}
