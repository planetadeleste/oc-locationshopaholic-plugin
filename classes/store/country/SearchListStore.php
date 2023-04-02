<?php

namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Country;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use PlanetaDelEste\ApiToolbox\Traits\Store\FilterListTrait;
use RainLab\Location\Models\Country;

class SearchListStore extends AbstractStoreWithParam
{

    use FilterListTrait;

    protected static $instance;

    /**
     * @param mixed $sValue
     *
     * @return \October\Rain\Database\Builder|Country
     */
    public function scopeSearch($sValue)
    {
        return $this->obQuery->where('name', 'like', "%{$sValue}%")
            ->orWhere('code', 'like', "%{$sValue}%")
            ->orWhere('calling_code', 'like', "%{$sValue}%");
    }

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Country::class;
    }
}
