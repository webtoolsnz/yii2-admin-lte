<?php
namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\widgets\ProgressInfoBox;

class InfoBoxWidgetTest extends TestCase
{
    public function testWidgetHtml()
    {
        $html = ProgressInfoBox::widget([
            'iconOptions' => ['class' => 'bg-aqua'],
            'icon' => '<i class="fa fa-bar-chart"></i>',
            'title' => 'Total Sales',
            'number' => '49',
            'percent' => 15,
            'description' => '15% Increase',
            'barOptions' => ['class' => 'progress-bar-info']
        ]);

        //file_put_contents(__DIR__.'/data/progress-infobox.html', $html);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/data/progress-infobox.html', $html);
    }
}
