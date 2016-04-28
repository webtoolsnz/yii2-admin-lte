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

use webtoolsnz\AdminLte\FlashMessage;

/**
 * Class FlashMessages
 * @package webtoolsnz\AdminLte\widgets
 */
class FlashMessages extends \yii\bootstrap\Widget
{
    public $messages;

    /**
     * @param FlashMessage $message
     * @return string
     * @throws \Exception
     */
    public function renderMessage(FlashMessage $message)
    {
        return Alert::widget([
            'title' => $message->title,
            'dismissible' => $message->dismissible,
            'type' => $message->type,
            'message' => $message->message,
        ]);
    }


    public function init()
    {
        parent::init();

        $session = \Yii::$app->getSession();
        $messages = [];
        foreach ($session->getAllFlashes() as $name => $flash) {
            if ($flash instanceof FlashMessage && $flash->validate()) {
                $messages[] = $this->renderMessage($flash);
                $session->removeFlash($name);
            }
        }

        echo implode(PHP_EOL, $messages);
    }
}
