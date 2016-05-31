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

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class TimeLineItem
 * @package webtoolsnz\AdminLte\widgets
 */
class TimeLineItem extends \yii\base\Widget
{
    /**
     * @var string
     */
    public $icon = 'fa fa-time bg-blue';

    /**
     * @var
     */
    public $time;

    /**
     * @var array
     */
    public $timeOptions = [];

    /**
     * @var string
     */
    public $title;

    /**
     * @var array
     */
    public $titleOptions = [];

    /**
     * @var string
     */
    public $content;

    /**
     * @var array
     */
    public $contentOptions = [];

    /**
     * @var array
     */
    public $options = [];

    /**
     * @var
     */
    public $timeFormatter;

    /**
     * @return string
     */
    public function run()
    {
        if (empty($this->content) && empty($this->title) && !empty($this->time)) {
            Html::addCssClass($this->options, 'time-label');
            return $this->renderTimeLabel();
        }

        $icon = Html::tag('i', null, ['class' => $this->icon]);

        return Html::tag('li', $icon.$this->renderItem(), $this->options);
    }

    /**
     * @return string
     */
    public function renderTimeLabel()
    {
        $label = Html::tag('span', $this->time, $this->timeOptions);
        return Html::tag('li', $label, $this->options);
    }

    /**
     * @return string
     */
    public function renderItem()
    {
        if (empty($this->content) && empty($this->title)) {
            return '';
        }

        Html::addCssClass($this->titleOptions, ['class' => 'timeline-header']);
        Html::addCssClass($this->contentOptions, ['class' => 'timeline-body']);
        Html::addCssClass($this->timeOptions, ['class' => 'time']);

        $time = Html::tag('i', null, ['class' => 'fa fa-clock-o']).' '.$this->time;

        $contents = [
            Html::tag('span', $time, $this->timeOptions),
            $this->title ? Html::tag('h3', $this->title, $this->titleOptions) : '',
            $this->content ? Html::tag('div', $this->content, $this->contentOptions) : '',
        ];

        return Html::tag('div', implode(PHP_EOL, $contents), ['class' => 'timeline-item']);
    }
}
