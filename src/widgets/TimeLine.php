<?php

namespace webtoolsnz\AdminLte\widgets;

use yii\helpers\Html;

class TimeLine extends \yii\base\Widget
{
    /**
     * @var
     */
    public $items = [];

    public $options = [];

    public function init()
    {
        $itemConfigs = $this->items;
        $this->items = [];

        foreach ($itemConfigs as $config) {
            $this->items[] = TimeLineItem::widget($config);
        }

        $this->items[] = TimeLineItem::widget([
            'icon' => 'fa fa-clock-o bg-gray',
        ]);
    }

    /**
     * @return string
     */
    public function run()
    {
        Html::addCssClass($this->options, 'timeline');
        return Html::tag('ul', implode(PHP_EOL, $this->items), $this->options);
    }
}
