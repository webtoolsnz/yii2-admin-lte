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
 * Class ThemeAsset
 * @package webtoolsnz\AdminLte
 */
class ThemeAsset extends \yii\web\AssetBundle
{
    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'webtoolsnz\AdminLte\AdminLteAsset'
    ];


    public $css = ['css/overrides.css'];
    /**
     * @var array
     */
    public $publishOptions = [
        'forceCopy' => true
    ];

    /**
     * set the source path to the local assets directory
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
    }
}
