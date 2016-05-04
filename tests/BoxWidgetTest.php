<?php
namespace webtoolsnz\AdminLte\tests;

use Symfony\Component\DomCrawler\Crawler;
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

    public function testCollapsedState()
    {
        $box = Box::widget(['title' => 'Collapsed Box', 'collapse' => true, 'collapsed' => true]);
        $crawler = new Crawler($box);
        $this->assertContains('collapsed-box', $crawler->filter('.box')->attr('class'));
        $this->assertEquals('fa fa-plus', $crawler->filter('.box .box-header .box-tools button[data-widget="collapse"] i')->attr('class'));

        $box = Box::widget(['title' => 'Expanded Box', 'collapse' => true, 'collapsed' => false]);
        $crawler = new Crawler($box);
        $this->assertNotContains('collapsed-box', $crawler->filter('.box')->attr('class'));
        $this->assertEquals('fa fa-minus', $crawler->filter('.box .box-header .box-tools button[data-widget="collapse"] i')->attr('class'));
    }
}
