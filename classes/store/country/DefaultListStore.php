<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Country;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;
use RainLab\Location\Models\Setting;

class DefaultListStore extends AbstractStoreWithoutParam
{

    /**
     * @inheritDoc
     */
    protected function getIDListFromDB(): array
    {
        $iCountryId = Setting::get('default_country');
        return empty($iCountryId) ? [] : array_wrap($iCountryId);
    }
}
