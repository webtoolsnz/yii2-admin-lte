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
 * Class AdminLteAsset
 * @package webtoolsnz\AdminLte
 */
class AdminLteAsset extends \yii\web\AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';

    /**
     * @var array
     */
    public $css = ['css/AdminLTE.min.css'];

    /**
     * @var array
     */
    public $js = ['js/app.min.js'];

    /**
     * @var array
     */
    public $depends = [
        'webtoolsnz\AdminLte\FontAwesomeAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @var string
     */
    public static $skin = Theme::SKIN_BLUE;

    public static $customSkin = '';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (!static::$customSkin && static::$skin) {
            $this->css[] = sprintf('css/skins/%s.min.css', static::$skin);
        }
    }
}
