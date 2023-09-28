<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Item;

use Lovata\Toolbox\Classes\Item\ElementItem;
use VojtaSvoboda\LocationTown\Models\Town;

/**
 * Class TownItem
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Item
 *
 * @property integer                   $id
 * @property integer                   $state_id
 * @property string                    $name
 * @property string                    $slug
 * @property string                    $description
 * @property bool                      $is_enabled
 * @property StateItem                 $state
 * @property \October\Rain\Argon\Argon $created_at
 * @property \October\Rain\Argon\Argon $updated_at
 *
 */
class TownItem extends ElementItem
{
    const MODEL_CLASS = Town::class;

    /** @var Town */
    protected $obElement = null;

    public $arRelationList = [
        'state' => [
            'class' => StateItem::class,
            'field' => 'state_id'
        ]
    ];

    protected function getElementData(): array
    {
        return [
            'id'          => $this->obElement->id,
            'state_id'    => $this->obElement->state_id,
            'name'        => $this->obElement->name,
            'slug'        => $this->obElement->slug,
            'description' => $this->obElement->description,
            'is_enabled'  => $this->obElement->is_enabled
        ];
    }
}
