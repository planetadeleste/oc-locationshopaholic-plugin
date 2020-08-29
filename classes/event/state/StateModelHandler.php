<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Event\State;

use Lovata\Toolbox\Classes\Event\ModelHandler;
use RainLab\Location\Models\State;
use PlanetaDelEste\LocationShopaholic\Classes\Item\StateItem;
use PlanetaDelEste\LocationShopaholic\Classes\Store\StateListStore;

/**
 * Class StateModelHandler
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Event\State
 */
class StateModelHandler extends ModelHandler
{
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
        return State::class;
    }

    /**
     * Get item class name
     *
     * @return string
     */
    protected function getItemClass()
    {
        return StateItem::class;
    }
}
