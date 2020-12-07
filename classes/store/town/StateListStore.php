<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Town;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use VojtaSvoboda\LocationTown\Models\Town;

class StateListStore extends AbstractStoreWithParam
{
    protected static $instance;

    /**
     * @inheritDoc
     */
    protected function getIDListFromDB(): array
    {
        return Town::where('state_id', $this->sValue)->lists('id');
    }
}
