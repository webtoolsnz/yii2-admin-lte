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

use yii\helpers\Html;

/**
 * Class Box
 * @package webtoolsnz\AdminLte\widgets
 */
class Box extends \yii\base\Widget
{
    const TYPE_DEFAULT = 'default';
    const TYPE_PRIMARY = 'primary';
    const TYPE_INFO = 'info';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';

    /**
     * @var string
     */
    public $title;

    /**
     * @var
     */
    public $icon;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $tools;

    /**
     * @var
     */
    public $footer;

    /**
     * @var bool
     */
    public $solid = false;

    /**
     * @var string
     */
    public $type = self::TYPE_DEFAULT;

    /**
     * @var bool
     */
    public $collapse = false;

    /**
     * @var bool
     */
    public $remove = false;

    /**
     * @var bool
     */
    public $headerWithBorder = false;

    /**
     * @var array
     */
    public $options = [];

    /**
     * @var string
     */
    public $spinner = '<span class="fa fa-cog fa-spin"></span>';

    /**
     * @var bool
     */
    public $bodyPadding = true;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, ['box', 'box-'.$this->type]);

        if ($this->solid) {
            Html::addCssClass($this->options, 'box-solid');
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        $content = [$this->renderHeading(), $this->renderBody(), $this->renderOverlay(), $this->renderFooter()];
        return Html::tag('div', implode(PHP_EOL, $content), $this->options);
    }

    /**
     * @return string
     */
    public function renderHeading()
    {
        $html = '';

        if ($this->icon) {
            $html .= Html::tag('i', null, ['class' => $this->icon]);
        }

        if ($this->title) {
            $html .= Html::tag('h3', $this->title, ['class' => 'box-title']);
        }

        $options = ['class' => 'box-header'];

        if ($this->headerWithBorder) {
            Html::addCssClass($options, 'with-border');
        }

        $html .= $this->renderTools();

        return Html::tag('div', $html, $options);
    }

    /**
     * @return string
     */
    public function renderBody()
    {
        $options = ['class' => 'box-body'];

        if (!$this->bodyPadding) {
            Html::addCssClass($options, 'no-padding');
        }

        return Html::tag('div', $this->content, $options);
    }

    /**
     * @return string
     */
    public function renderFooter()
    {
        return $this->footer ? Html::tag('div', $this->footer, ['class' => 'box-footer']) : '';
    }

    /**
     * @return string
     */
    public function renderOverlay()
    {
        return Html::tag('div', $this->spinner, ['class' => 'overlay']);
    }

    /**
     * @return string
     */
    public function renderTools()
    {
        $tools = [];

        if ($this->tools) {
            $tools[] = $this->tools;
        }

        if ($this->collapse) {
            $tools[] = Html::tag('button', '<i class="fa fa-minus"></i>', [
                'class' => 'btn btn-default btn-xs',
                'data-widget' => 'collapse',
            ]);
        }

        if ($this->remove) {
            $tools[] = Html::tag('button', '<i class="fa fa-times"></i>', [
                'class' => 'btn btn-default btn-xs',
                'data-widget' => 'remove',
            ]);
        }

        return Html::tag('div', implode(' ', $tools), ['class' => 'box-tools pull-right']);
    }
}
