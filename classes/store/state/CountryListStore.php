<?php

namespace PlanetaDelEste\LocationShopaholic\Classes\Store\State;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use RainLab\Location\Models\State;

class CountryListStore extends AbstractStoreWithParam
{
    protected static $instance;

    /**
     * @inheritDoc
     */
    protected function getIDListFromDB(): array
    {
        return State::where('country_id', $this->sValue)->lists('id');
    }
}
