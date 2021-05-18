<?php namespace PlanetaDelEste\LocationShopaholic;

use Event;
use PlanetaDelEste\LocationShopaholic\Classes\Event\ApiShopaholicHandle;
use PlanetaDelEste\LocationShopaholic\Classes\Event\Country\CountryModelHandler;
use PlanetaDelEste\LocationShopaholic\Classes\Event\State\StateModelHandler;
use PlanetaDelEste\LocationShopaholic\Classes\Event\Town\TownModelHandler;
use System\Classes\PluginBase;

/**
 * Class Plugin
 * @package PlanetaDelEste\LocationShopaholic
 */
class Plugin extends PluginBase
{
    const EVENT_ITEMRESOURCE_DATA = 'planetadeleste.locationShopaholic.itemResourceData';
    public $require = ['Lovata.Toolbox', 'RainLab.Location', 'VojtaSvoboda.LocationTown'];

    public function boot()
    {
        Event::subscribe(CountryModelHandler::class);
        Event::subscribe(StateModelHandler::class);
        Event::subscribe(TownModelHandler::class);
        Event::subscribe(ApiShopaholicHandle::class);
    }
}
