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

namespace webtoolsnz\AdminLte;

use webtoolsnz\AdminLte\widgets\Alert;

/**
 * Class FlashMessage
 * @package webtoolsnz\AdminLte
 */
class FlashMessage extends \yii\base\Model
{
    const TYPE_ERROR = Alert::TYPE_DANGER;
    const TYPE_SUCCESS = Alert::TYPE_SUCCESS;
    const TYPE_INFO = Alert::TYPE_INFO;
    const TYPE_WARNING = Alert::TYPE_WARNING;

    /**
     * @var array
     */
    private $messageTypes = [
        self::TYPE_ERROR,
        self::TYPE_SUCCESS,
        self::TYPE_WARNING,
        self::TYPE_INFO,
    ];

    /**
     * @var
     */
    public $type;

    /**
     * @var
     */
    public $title;

    /**
     * @var
     */
    public $message;

    /**
     * @var bool
     */
    public $dismissible = true;

    /**
     * Validate the message properties.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['type', 'default', 'value' => self::TYPE_INFO],
            ['type', 'in', 'range' => $this->messageTypes],
            ['message', 'required'],
        ];
    }
}
