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

use yii\bootstrap\Progress;
use yii\helpers\Html;

/**
 * Class ProgressInfoBox
 * @package webtoolsnz\AdminLte\widgets
 */
class ProgressInfoBox extends InfoBox
{
    /**
     * @var int
     */
    public $percent = 0;

    /**
     * @var string
     */
    public $title = '';

    /**
     * @var string
     */
    public $number = '';

    /**
     * @var string
     */
    public $description = '';

    /**
     * @var array
     */
    public $barOptions = [];

    /**
     * @return string
     */
    public function renderBody()
    {
        $html = [
            Html::tag('span', $this->title, ['class' => 'info-box-text']),
            Html::tag('span', $this->number, ['class' => 'info-box-number']),
            Progress::widget([
                'percent' => $this->percent,
                'barOptions' => $this->barOptions,
            ]),
            Html::tag('span', $this->description, ['class' => 'progress-description']),
        ];

        return Html::tag('div', implode(PHP_EOL, $html), ['class' => 'info-box-content']);
    }
}
