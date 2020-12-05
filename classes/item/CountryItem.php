<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Item;

use Cms\Classes\Page as CmsPage;
use Lovata\Toolbox\Classes\Helper\PageHelper;
use Lovata\Toolbox\Classes\Item\ElementItem;
use PlanetaDelEste\LocationShopaholic\Classes\Collection\StateCollection;
use RainLab\Location\Models\Country;
use RainLab\Location\Models\Setting;


/**
 * Class CountryItem
 *
 * @package PlanetaDelEste\LocationShopaholic\Classes\Item
 *
 * @property integer                                                                     $id
 * @property string                                                                      $name
 * @property string                                                                      $code
 * @property bool                                                                        $is_pinned
 * @property bool                                                                        $is_enabled
 * @property bool                                                                        $is_default
 * @property StateCollection|\PlanetaDelEste\LocationShopaholic\Classes\Item\StateItem[] $states
 * @property \October\Rain\Argon\Argon                                                   $created_at
 * @property \October\Rain\Argon\Argon                                                   $updated_at
 */
class CountryItem extends ElementItem
{
    const MODEL_CLASS = Country::class;

    /** @var Country */
    protected $obElement = null;

    public $arRelationList = [
        'states' => [
            'class' => StateCollection::class,
            'field' => 'state_id_list'
        ]
    ];

    protected function getElementData(): array
    {
        return [
            'id'            => $this->obElement->id,
            'name'          => $this->obElement->name,
            'code'          => $this->obElement->code,
            'is_pinned'     => $this->obElement->is_pinned,
            'is_enabled'    => $this->obElement->is_enabled,
            'state_id_list' => $this->obElement->states->lists('id'),
            'is_default'    => Setting::get('default_country') == $this->obElement->id
        ];
    }

    /**
     * Returns URL of a brand page.
     *
     * @param string $sPageCode
     *
     * @return string
     */
    public function getPageUrl($sPageCode = 'country')
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
        $arParamList = PageHelper::instance()->getUrlParamList($sPageCode, 'CountryPage');
        if (!empty($arParamList)) {
            $sPageParam = array_shift($arParamList);
            $arPageParamList[$sPageParam] = $this->slug;
        }

        return $arPageParamList;
    }
}
