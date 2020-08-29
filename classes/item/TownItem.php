<?php namespace PlanetaDelEste\LocationShopaholic\Classes\Item;

use Cms\Classes\Page as CmsPage;
use Lovata\Toolbox\Classes\Helper\PageHelper;
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

    /**
     * Returns URL of a brand page.
     *
     * @param string $sPageCode
     *
     * @return string
     */
    public function getPageUrl($sPageCode = 'town')
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
        $arParamList = PageHelper::instance()->getUrlParamList($sPageCode, 'TownPage');
        if (!empty($arParamList)) {
            $sPageParam = array_shift($arParamList);
            $arPageParamList[$sPageParam] = $this->slug;
        }

        return $arPageParamList;
    }
}
