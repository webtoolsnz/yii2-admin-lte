<?php
namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\widgets\Callout;
use Symfony\Component\DomCrawler\Crawler;

class CalloutWidgetTest extends TestCase
{
    public function testCalloutRender()
    {
        $html = Callout::widget([
            'type' => Callout::TYPE_SUCCESS,
            'title' => 'Callout Title!',
            'message' => 'Callout Message',
        ]);

        $dom = new Crawler($html);
        $root = $dom->filter('div.callout');
        $this->assertEquals('callout callout-success callout-with-icon', $root->attr('class'));
        $title = $root->filter('.callout-content > h4.callout-title');
        $this->assertContains('Callout Title!', $title->text());
        $this->assertEquals('fa fa-check-circle', $root->filter('.callout-icon i')->attr('class'));
        $this->assertContains('Callout Message', $root->filter('.callout-content p.callout-message')->text());
    }

    public function testWithoutTitleOrIcon()
    {
        $html = Callout::widget([
            'type' => Callout::TYPE_SUCCESS,
            'message' => 'Callout Message',
            'showIcon' => false,
        ]);

        $dom = new Crawler($html);
        $root = $dom->filter('div.callout');
        $this->assertEquals('callout callout-success', $root->attr('class'));
        $this->assertContains('Callout Message', $root->filter('.callout-content p.callout-message')->text());
    }
}
