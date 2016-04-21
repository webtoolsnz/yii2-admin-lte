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
 * Class InfoBox
 * @package webtoolsnz\AdminLte\widgets
 */
class InfoBox extends \yii\base\Widget
{
    public $title;

    /**
     * @var string
     */
    public $icon;

    /**
     * @var array
     */
    public $iconOptions = ['class' => ''];

    /**
     * @var string
     */
    public $content;

    /**
     * @var
     */
    public $background;

    /**
     * @var bool
     */
    public $bodyPadding = true;

    /**
     * @var array
     */
    public $options = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, ['info-box']);
        Html::addCssClass($this->iconOptions, 'info-box-icon');

        if ($this->background) {
            Html::addCssClass($this->options, 'bg-'.$this->background);
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        $content = [$this->renderIcon(), $this->renderBody()];
        return Html::tag('div', implode(PHP_EOL, $content), $this->options);
    }

    /**
     * @return string
     */
    public function renderIcon()
    {
        return Html::tag('span', $this->icon, $this->iconOptions);
    }

    /**
     * @return string
     */
    public function renderBody()
    {
        $html = [];
        $options = ['class' => 'info-box-content'];

        if ($this->title) {
            $html[] = Html::tag('span', $this->title, ['class' => 'info-box-text']);
        }

        if (!$this->bodyPadding) {
            Html::addCssClass($options, 'no-padding');
        }

        $html[] = $this->content;

        return Html::tag('div', implode(PHP_EOL, $html), $options);
    }
}
