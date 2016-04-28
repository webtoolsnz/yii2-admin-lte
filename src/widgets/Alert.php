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
 * Class Alert
 * @package webtoolsnz\AdminLte\widgets
 */
class Alert extends \yii\base\Widget
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
    public $dismissible = false;

    /**
     * @var array
     */
    public $options = [];

    /**
     * @var array
     */
    private static $_typeIcons = [
        self::TYPE_INFO => 'icon fa fa-info',
        self::TYPE_SUCCESS => 'icon fa fa-check',
        self::TYPE_WARNING => 'icon fa fa-warning',
        self::TYPE_DANGER => 'icon fa fa-ban',
    ];

    /**
     * @return string
     */
    public function run()
    {
        Html::addCssClass($this->options, ['alert', 'alert-' . $this->type]);

        if ($this->dismissible) {
            Html::addCssClass($this->options, 'alert-dismissible');
        }

        $html = [$this->renderTitle(), $this->message];

        return Html::tag('div', implode(PHP_EOL, $html), $this->options);
    }

    /**
     * @return string
     */
    public function renderTitle()
    {
        if ($this->title) {
            $icon = Html::tag('i', null, [
                'class' => ArrayHelper::getValue(self::$_typeIcons, $this->type, 'icon fa fa-info')
            ]);

            $html = Html::tag('h4', $icon . $this->title . $this->renderDismissButton());
        } else {
            $html = $this->renderDismissButton();
        }

        return $html;
    }

    /**
     * @return string
     */
    public function renderDismissButton()
    {
        return $this->dismissible ? Html::button('×', [
            'class' => 'close',
            'data-dismiss' => 'alert',
        ]) : '';
    }
}
