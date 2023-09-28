<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Item;

use Cms\Classes\Page as CmsPage;

use Lovata\Toolbox\Classes\Item\ElementItem;
use Lovata\Toolbox\Classes\Helper\PageHelper;
use October\Rain\Argon\Argon;
use PlanetaDelEste\LocationShopaholic\Classes\Collection\TownCollection;
use RainLab\Location\Models\Setting;
use RainLab\Location\Models\State;
use VojtaSvoboda\LocationTown\Models\Town;

/**
 * Class StateItem
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Item
 *
 * @property integer                   $id
 * @property integer                   $country_id
 * @property string                    $name
 * @property string                    $code
 * @property boolean                   $is_default
 * @property boolean                   $is_enabled
 * @property CountryItem               $country
 * @property TownCollection|TownItem[] $towns
 * @property Argon                     $created_at
 * @property Argon                     $updated_at
 */
class StateItem extends ElementItem
{
    const MODEL_CLASS = State::class;

    /** @var State */
    protected $obElement = null;

    public $arRelationList = [
        'country' => [
            'class' => CountryItem::class,
            'field' => 'country_id'
        ],
        'towns'   => [
            'class' => TownCollection::class,
            'field' => 'town_id_list'
        ]
    ];

    protected function getElementData(): array
    {
        return [
            'id'           => $this->obElement->id,
            'country_id'   => $this->obElement->country_id,
            'name'         => $this->obElement->name,
            'code'         => $this->obElement->code,
            'town_id_list' => Town::where('state_id', $this->obElement->id)->lists('id'),
            'is_default'   => Setting::get('default_state') == $this->obElement->id
        ];
    }
}
