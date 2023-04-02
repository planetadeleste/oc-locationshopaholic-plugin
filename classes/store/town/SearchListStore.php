<?php

namespace PlanetaDelEste\LocationShopaholic\Classes\Store\Town;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithParam;
use PlanetaDelEste\ApiToolbox\Traits\Store\FilterListTrait;
use VojtaSvoboda\LocationTown\Models\Town;

class SearchListStore extends AbstractStoreWithParam
{
    use FilterListTrait;

    protected static $instance;

    /**
     * @param mixed $sValue
     *
     * @return \October\Rain\Database\Builder|Town
     */
    public function scopeSearch($sValue)
    {
        return $this->obQuery->where('name', 'like', "%{$sValue}%")
            ->orWhere('slug', 'like', "%{$sValue}%");
    }

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Town::class;
    }
}
