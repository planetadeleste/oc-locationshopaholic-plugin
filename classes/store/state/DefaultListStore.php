<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\State;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;
use RainLab\Location\Models\Setting;

class DefaultListStore extends AbstractStoreWithoutParam
{

    /**
     * @inheritDoc
     */
    protected function getIDListFromDB(): array
    {
        $iCountryId = Setting::get('default_state');
        return empty($iCountryId) ? [] : array_wrap($iCountryId);
    }
}
