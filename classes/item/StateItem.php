<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Item;

use Cms\Classes\Page as CmsPage;

use Lovata\Toolbox\Classes\Item\ElementItem;
use Lovata\Toolbox\Classes\Helper\PageHelper;
use PlanetaDelEste\LocationShopaholic\Classes\Collection\TownCollection;
use RainLab\Location\Models\Setting;
use RainLab\Location\Models\State;
use VojtaSvoboda\LocationTown\Models\Town;

/**
 * Class StateItem
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Item
 *
 * @property integer                                                                   $id
 * @property integer                                                                   $country_id
 * @property string                                                                    $name
 * @property string                                                                    $code
 * @property boolean                                                                   $is_default
 * @property CountryItem                                                               $country
 * @property TownCollection|\PlanetaDelEste\LocationShopaholic\Classes\Item\TownItem[] $towns
 * @property \October\Rain\Argon\Argon                                                 $created_at
 * @property \October\Rain\Argon\Argon                                                 $updated_at
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

    protected function getElementData()
    {
        return [
            'town_id_list' => Town::where('state_id', $this->obElement->id)->lists('id'),
            'is_default'   => Setting::get('default_state') == $this->obElement->id
        ];
    }

    /**
     * Returns URL of a brand page.
     *
     * @param string $sPageCode
     *
     * @return string
     */
    public function getPageUrl($sPageCode = 'state')
    {
        //Get URL params
        $arParamList = $this->getPageParamList($sPageCode);

        //Generate page URL
        $sURL = CmsPage::url($sPageCode, $arParamList);

        return $sURL;
    }

    /**
     * Get URL param list by page code
     *
     * @param string $sPageCode
     *
     * @return array
     */
    public function getPageParamList($sPageCode): array
    {
        $arPageParamList = [];

        //Get URL params for page
        $arParamList = PageHelper::instance()->getUrlParamList($sPageCode, 'StatePage');
        if (!empty($arParamList)) {
            $sPageParam = array_shift($arParamList);
            $arPageParamList[$sPageParam] = $this->slug;
        }

        return $arPageParamList;
    }
}
