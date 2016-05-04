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
    public $collapsed = false;

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
     * @var array
     */
    public $headerOptions = [];

    /**
     * @var array
     */
    public $footerOptions = [];

    /**
     * @var array
     */
    public $bodyOptions = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, ['box', 'box-' . $this->type]);

        if ($this->solid) {
            Html::addCssClass($this->options, 'box-solid');
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        if ($this->collapse && $this->collapsed) {
            Html::addCssClass($this->options, 'collapsed-box');
        }

        $content = [$this->renderHeading(), $this->renderBody(), $this->renderOverlay(), $this->renderFooter()];
        return Html::tag('div', implode(PHP_EOL, $content), $this->options);
    }

    /**
     * @return string
     */
    public function renderHeading()
    {
        $html = $this->renderIcon();
        $html .= $this->renderTitle();

        Html::addCssClass($this->headerOptions, 'box-header');

        if ($this->headerWithBorder) {
            Html::addCssClass($this->headerOptions, 'with-border');
        }

        $html .= $this->renderTools();

        return ($this->title || $this->tools) ? Html::tag('div', $html, $this->headerOptions) : '';
    }

    /**
     * @return string
     */
    public function renderBody()
    {
        Html::addCssClass($this->bodyOptions, 'box-body');

        if (!$this->bodyPadding) {
            Html::addCssClass($this->bodyOptions, 'no-padding');
        }

        $content = trim($this->content);
        return !empty($content) ? Html::tag('div', $content, $this->bodyOptions) : '';
    }

    /**
     * @return string
     */
    public function renderFooter()
    {
        Html::addCssClass($this->footerOptions, 'box-footer');

        return $this->footer ? Html::tag('div', $this->footer, $this->footerOptions) : '';
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

        $tools[] = $this->renderCollapseButton();
        $tools[] = $this->renderRemoveButton();

        return Html::tag('div', implode(' ', $tools), ['class' => 'box-tools pull-right']);
    }

    /**
     * @return string
     */
    public function renderCollapseButton()
    {
        $icon = $this->collapsed ? '<i class="fa fa-plus"></i>' : '<i class="fa fa-minus"></i>';

        return $this->collapse ? Html::tag('button', $icon, [
            'class' => 'btn btn-default btn-xs',
            'data-widget' => 'collapse',
        ]) : '';
    }

    /**
     * @return string
     */
    public function renderRemoveButton()
    {
        return $this->remove ? Html::tag('button', '<i class="fa fa-times"></i>', [
            'class' => 'btn btn-default btn-xs',
            'data-widget' => 'remove',
        ]) : '';
    }

    /**
     * @return string
     */
    public function renderIcon()
    {
        return $this->icon ? Html::tag('i', null, ['class' => $this->icon]) : '';
    }

    /**
     * @return string
     */
    public function renderTitle()
    {
        return $this->title ? Html::tag('h3', $this->title, ['class' => 'box-title']) : '';
    }
}
