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

use yii\web\AssetBundle;

/**
 * Class FontAwesomeAsset
 * @package webtoolsnz\AdminLte
 */
class FontAwesomeAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/fortawesome/font-awesome';

    /**
     * @var array
     */
    public $css = ['css/font-awesome.min.css'];

    /**
     * @var array
     */
    public $publishOptions = [
        'forceCopy' => true,
        'only' => [
            'fonts/*',
            'css/*',
        ]
    ];
}
