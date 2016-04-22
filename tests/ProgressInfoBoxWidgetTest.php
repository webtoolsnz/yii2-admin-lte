<?php
namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\widgets\InfoBox;

class ProgressInfoBoxWidgetTest extends TestCase
{
    public function testWidgetHtml()
    {
        $html = InfoBox::widget([
            'iconOptions' => ['class' => 'bg-red'],
            'icon' => '<i class="fa fa-hashtag"></i>',
            'title' => 'Title',
            'content' => 'Interesting content!',
            'background' => 'red',
            'bodyPadding' => false,
        ]);

        $this->assertXmlStringEqualsXmlFile(__DIR__.'/data/basic-infobox.html', $html);
    }
}
