<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Resource\Town;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class IndexCollection
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Resource\Town
 */
class IndexCollection extends ResourceCollection
{
    public $collects = ShowResource::class;

    public function toArray($request)
    {
        return $this->collection;
    }
}
