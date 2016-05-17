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

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Callout
 * @package webtoolsnz\AdminLte\widgets
 */
class Callout extends \yii\base\Widget
{
    const TYPE_INFO = 'info';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $type = self::TYPE_INFO;

    /**
     * @var bool
     */
    public $showIcon = true;

    /**
     * @var array
     */
    public $options = [];

    /**
     * @var array
     */
    private static $_typeIcons = [
        self::TYPE_INFO => 'fa fa-info-circle',
        self::TYPE_SUCCESS => 'fa fa-check-circle',
        self::TYPE_WARNING => 'fa fa-exclamation-circle',
        self::TYPE_DANGER => 'fa fa-exclamation-triangle',
    ];

    /**
     * @return string
     */
    public function run()
    {
        Html::addCssClass($this->options, ['callout', 'callout-'.$this->type]);
        $html = [$this->renderIcon(), $this->renderContent()];

        if ($this->showIcon) {
            Html::addCssClass($this->options, 'callout-with-icon');
        }

        return Html::tag(
            'div',
            Html::tag('div', implode(PHP_EOL, $html), ['class' => 'clearfix']),
            $this->options
        );
    }

    /**
     * @return string
     */
    public function renderContent()
    {
        $html = [];

        if ($this->title) {
            $html[] = Html::tag('h4', $this->title, ['class' => 'callout-title']);
        } else {
            $html[] = Html::tag('h4', null, ['class' => 'hidden-xs hidden-sm']);
        }

        $html[] = Html::tag('p', $this->message, ['class' => 'callout-message']);

        return Html::tag('div', implode(PHP_EOL, $html), ['class' => 'callout-content']);
    }

    /**
     * @return string
     */
    public function renderIcon()
    {
        if ($this->showIcon) {
            $icon = Html::tag('i', null, [
                'class' => ArrayHelper::getValue(self::$_typeIcons, $this->type, 'fa fa-info')
            ]);

            return Html::tag('div', $icon, ['class' => 'hidden-sm hidden-xs callout-icon']);
        }

        return '';
    }
}
