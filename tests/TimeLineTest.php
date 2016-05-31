<?php
namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\widgets\TimeLine;
use Symfony\Component\DomCrawler\Crawler;

class TimeLineTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testTimeLineRender()
    {
        $html = TimeLine::widget([
            'items' => [
                ['time' => 'Today'],
                [
                    'icon' => 'fa fa-plus bg-green',
                    'title' => 'Example Title',
                    'content' => 'This is some content',
                    'time' => '5 mins ago',
                ]
            ],
        ]);

        $dom = new Crawler($html);
        $root = $dom->filter('ul.timeline');

        $label = $root->filter('li.time-label:first-child');
        $this->assertContains('Today', $label->text());

        $item = $label->siblings()->filter('li');
        $this->assertEquals('fa fa-plus bg-green', $item->filter('i')->attr('class'));
        $this->assertContains('Example Title', $item->filter('h3.timeline-header')->text());
        $this->assertContains('This is some content', $item->filter('div.timeline-body')->text());
        $this->assertContains('5 mins ago', $item->filter('.time')->text());
    }
}
