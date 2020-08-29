<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Country;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;
use RainLab\Location\Models\Country;

class ActiveListStore extends AbstractStoreWithoutParam
{
    protected static $instance;

    /**
     * @inheritDoc
     */
    protected function getIDListFromDB(): array
    {
        return Country::isEnabled()->lists('id');
    }
}
