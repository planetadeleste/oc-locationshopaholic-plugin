<?php

namespace PlanetaDelEste\LocationShopaholic\Classes\Store\State;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;
use RainLab\Location\Models\State;

class ActiveListStore extends AbstractStoreWithoutParam
{

    protected static $instance;

    /**
     * @inheritDoc
     */
    protected function getIDListFromDB(): array
    {
        return State::isEnabled()->lists('id');
    }
}
