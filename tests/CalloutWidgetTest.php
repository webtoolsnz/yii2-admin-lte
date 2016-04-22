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

        $this->assertXmlStringEqualsXmlFile(__DIR__.'/data/basic-callout.html', $html);
    }

    public function testWidgetWithIcon()
    {
        $html = Callout::widget([
            'type' => Callout::TYPE_DANGER,
            'title' => 'Title!',
            'message' => 'This is an informative call out!',
        ]);

        $this->assertXmlStringEqualsXmlFile(__DIR__.'/data/icon-callout.html', $html);
    }
}
