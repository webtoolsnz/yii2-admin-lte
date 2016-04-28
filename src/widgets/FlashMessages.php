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
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * - \Yii::$app->getSession()->setFlash('error', 'This is the message');
 * - \Yii::$app->getSession()->setFlash('success', 'This is the message');
 * - \Yii::$app->getSession()->setFlash('info', 'This is the message');
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class FlashMessages extends \yii\bootstrap\Widget
{
    /**
     * @return FlashMessage[]
     */
    protected function getMessages()
    {
        $session = \Yii::$app->getSession();
        $messages = [];
        foreach ($session->getAllFlashes() as $name => $flash) {
            if ($flash instanceof FlashMessage && $flash->validate()) {
                $messages[] = $flash;
                $session->removeFlash($name);
            }
        }

        return $messages;
    }

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
