<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Event\Town;

use Lovata\Toolbox\Classes\Event\ModelHandler;
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

    /**
     * Get model class name
     *
     * @return string
     */
    protected function getModelClass()
    {
        return Town::class;
    }

    /**
     * Get item class name
     *
     * @return string
     */
    protected function getItemClass()
    {
        return TownItem::class;
    }
}
