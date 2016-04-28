<?php
namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\widgets\FlashMessages;
use Yii;
use Symfony\Component\DomCrawler\Crawler;
use webtoolsnz\AdminLte\FlashMessage;

class FlashMessagesWidgetTest extends TestCase
{
    public function testMessageRender()
    {
        $message = new FlashMessage();
        $message->title = 'Error!';
        $message->type = FlashMessage::TYPE_ERROR;
        $message->message = 'This is a test error';

        Yii::$app->session->setFlash('test', $message);

        $html = FlashMessages::widget([
            'id' => 'flash-test'
        ]);

        $dom = new Crawler($html);

        $this->assertContains('This is a test error', $dom->text());
        $this->assertContains('Error!', $dom->filter('h4')->text());
    }
}
