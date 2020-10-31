<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\Country;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class IndexCollection
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\Country
 */
class IndexCollection extends ResourceCollection
{
    public $collects = ShowResource::class;

    public function toArray($request)
    {
        return $this->collection;
    }
}
