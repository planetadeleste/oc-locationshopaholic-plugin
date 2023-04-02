<?php

namespace PlanetaDelEste\LocationShopaholic\Classes\Store\State;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use PlanetaDelEste\ApiToolbox\Traits\Store\FilterListTrait;
use RainLab\Location\Models\State;

class SearchListStore extends AbstractStoreWithParam
{

    use FilterListTrait;

    protected static $instance;

    /**
     * @param mixed $sValue
     *
     * @return \October\Rain\Database\Builder|State
     */
    public function scopeSearch($sValue)
    {
        return $this->obQuery->where('name', 'like', "%{$sValue}%")
            ->orWhere('code', 'like', "%{$sValue}%");
    }

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return State::class;
    }
}
