<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Event;

use PlanetaDelEste\ApiToolbox\Plugin;
use PlanetaDelEste\LocationShopaholic\Classes\Collection\CountryCollection;
use PlanetaDelEste\LocationShopaholic\Classes\Collection\StateCollection;
use PlanetaDelEste\LocationShopaholic\Classes\Collection\TownCollection;
use RainLab\Location\Models\Country;
use RainLab\Location\Models\State;
use VojtaSvoboda\LocationTown\Models\Town;

class ApiShopaholicHandle
{
    /**
     * @param \October\Rain\Events\Dispatcher $obEvent
     */
    public function subscribe($obEvent)
    {

        $obEvent->listen(
            Plugin::EVENT_API_ADD_COLLECTION,
            function () {
                return $this->addCollections();
            }
        );
    }

    protected function addCollections(): array
    {
        return [
            Country::class => CountryCollection::class,
            State::class   => StateCollection::class,
            Town::class    => TownCollection::class
        ];
    }
}
