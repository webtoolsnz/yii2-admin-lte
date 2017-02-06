<?php
/**
 * This file is part of the webtoolsnz\AdminLte library
 *
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/webtoolsnz/yii2-admin-lte
 * @package webtoolsnz/yii2-admin-lte
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace webtoolsnz\AdminLte;

/**
 * Class Theme
 * @package webtoolsnz\AdminLte
 *
 * @property $skin string;
 * @property $customSkin string;
 */
class Theme extends \yii\base\Theme
{
    const SKIN_BLACK = 'skin-black';
    const SKIN_BLACK_LIGHT = 'skin-black-light';
    const SKIN_BLUE = 'skin-blue';
    const SKIN_BLUE_LIGHT = 'skin-blue-light';
    const SKIN_GREEN = 'skin-green';
    const SKIN_GREEN_LIGHT = 'skin-green-light';
    const SKIN_YELLOW = 'skin-yellow';
    const SKIN_YELLOW_LIGHT = 'skin-yellow-light';
    const SKIN_RED = 'skin-red';
    const SKIN_RED_LIGHT = 'skin-red-light';
    const SKIN_PURPLE = 'skin-purple';
    const SKIN_PURPLE_LIGHT = 'skin-purple-light';

    const LAYOUT_SIDEBAR_MINI = 'sidebar-mini';
    const LAYOUT_TOP_NAV = 'layout-top-nav';

    /**
     * @var string
     */
    public $root = '@app';

    /**
     * @var array
     */
    public $topMenuItems = [];

    /**
     * @var array
     */
    public $mainMenuItems = [];

    public $layout = Theme::LAYOUT_SIDEBAR_MINI;

    /**
     *  Set the basePath of the theme, the
     */
    public function init()
    {
        $this->basePath = __DIR__;
        AdminLteAsset::$skin = $this->skin;
        AdminLteAsset::$customSkin = $this->customSkin;

        if (!$this->pathMap) {
            $this->createPathMap();
        }
    }

    /**
     * @throws \yii\base\InvalidConfigException
     */
    protected function createPathMap()
    {
        $this->pathMap = [
            $this->root.'/views' => [
                $this->root.'/views',
                $this->getPath('views'),
            ],
        ];
    }

    /**
     * @param $skin
     */
    public function setSkin($skin)
    {
        AdminLteAsset::$skin = $skin;
    }

    /**
     * @return string
     */
    public function getSkin()
    {
        return AdminLteAsset::$skin;
    }

    /**
     * @param $skin
     */
    public function setCustomSkin($skin)
    {
        AdminLteAsset::$customSkin = $skin;
    }

    /**
     * @return string
     */
    public function getCustomSkin()
    {
        return AdminLteAsset::$customSkin;
    }
}
