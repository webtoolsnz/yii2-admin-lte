<?php
namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\widgets\Callout;


class CalloutWidgetTest extends TestCase
{
    public function testWidgetHtml()
    {
        $html = Callout::widget([
            'type' => Callout::TYPE_INFO,
            'title' => 'Title!',
            'message' => 'This is an informative call out!',
            'showIcon' => false,
        ]);

        file_put_contents(__DIR__.'/data/basic-callout.html', $html);

        $this->assertXmlStringEqualsXmlFile(__DIR__.'/data/basic-callout.html', $html);
    }

    public function testWidgetWithIcon()
    {
        $html = Callout::widget([
            'type' => Callout::TYPE_DANGER,
            'title' => 'Title!',
            'message' => 'This is an informative call out!',
        ]);

        file_put_contents(__DIR__.'/data/icon-callout.html', $html);

        $this->assertXmlStringEqualsXmlFile(__DIR__.'/data/icon-callout.html', $html);
    }
}
