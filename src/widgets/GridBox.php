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

namespace webtoolsnz\AdminLte\widgets;

/**
 * Class GridBox
 * @package webtoolsnz\AdminLte\widgets
 */
class GridBox extends \yii\grid\GridView
{
    /**
     * @var string
     */
    public $tools = '';

    /**
     * @var array
     */
    public $boxOptions = [];

    /**
     * @var array
     */
    protected $defaultBoxOptions = [
        'type' => Box::TYPE_DEFAULT,
        'bodyPadding' => false,
        'footerOptions' => ['class' => 'text-right'],
    ];

    /**
     * Runs the widget.
     */
    public function run()
    {
        $options = array_merge($this->defaultBoxOptions, [
            'options' => $this->options,
            'title' => $this->renderSummary(),
            'tools' => $this->tools,
            'content' => $this->renderItems(),
            'footer' => $this->renderPager(),
        ], $this->boxOptions);

        echo \webtoolsnz\AdminLte\widgets\Box::widget($options);
    }
}
