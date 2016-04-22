<?php
namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\widgets\Box;

class BoxWidgetTest extends TestCase
{
    public function testBasicBoxHtml()
    {
        $html = Box::widget([
            'title' => 'Title',
            'content' => 'Content'
        ]);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/data/basic-box.html', $html);
    }

    public function testAdvancedBoxHtml()
    {
        $html = Box::widget([
            'title' => 'Title',
            'icon' => 'fa fa-user',
            'collapse' => true,
            'remove' => true,
            'solid' => true,
            'headerWithBorder' => true,
            'content' => 'Content',
            'footer' => 'Footer',
            'type' => Box::TYPE_SUCCESS,
            'bodyPadding' => false,
            'tools' => '<span class="label label-default">A Label</span>'
        ]);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/data/advanced-box.html', $html);
    }
}
