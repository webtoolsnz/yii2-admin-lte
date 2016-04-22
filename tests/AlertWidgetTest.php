<?php
namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\widgets\Alert;

class AlertWidgetTest extends TestCase
{
    public function testBasicBoxHtml()
    {
        $html = Alert::widget([
            'type' => Alert::TYPE_SUCCESS,
            'title' => 'Alert Title!',
            'message' => 'Alert Message',
            'dismissible' => true,
        ]);

        $this->assertXmlStringEqualsXmlFile(__DIR__.'/data/advanced-alert.html', $html);
    }
}
