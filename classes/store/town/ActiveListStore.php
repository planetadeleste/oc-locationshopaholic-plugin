<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Town;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;
use VojtaSvoboda\LocationTown\Models\Town;

class ActiveListStore extends AbstractStoreWithoutParam
{
    protected static $instance;

    /**
     * @inheritDoc
     */
    protected function getIDListFromDB(): array
    {
        return Town::isEnabled()->lists('id');
    }
}
