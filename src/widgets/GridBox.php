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

use yii\grid\GridViewAsset;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Class GridBox
 * @package webtoolsnz\AdminLte\widgets
 */
class GridBox extends \yii\grid\GridView
{
    /**
     * @var string|null
     */
    public $title;

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
    ];

    /**
     * @var array
     */
    public $summaryOptions = ['class' => 'summary pull-left'];

    /**
     * Runs the widget.
     */
    public function run()
    {
        $id = $this->options['id'];
        $options = Json::htmlEncode($this->getClientOptions());
        $view = $this->getView();
        GridViewAsset::register($view);
        $view->registerJs("jQuery('#$id').yiiGridView($options);");

        $options = array_merge($this->defaultBoxOptions, [
            'options' => $this->options,
            'title' => $this->title,
            'tools' => $this->tools,
            'content' => '<div class="table-responsive">'.$this->renderItems().'</div>',
            'footer' => $this->renderFooter(),
        ], $this->boxOptions);

        echo \webtoolsnz\AdminLte\widgets\Box::widget($options);
    }

    /**
     * @return string
     */
    public function renderFooter()
    {
        return $this->renderSummary() . Html::tag(
            'div',
            $this->renderPager(),
            ['class' => 'text-right pull-right']
        );
    }
}
