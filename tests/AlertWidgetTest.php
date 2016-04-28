<?php
namespace webtoolsnz\AdminLte\tests;

use Symfony\Component\DomCrawler\Crawler;
use webtoolsnz\AdminLte\widgets\Alert;

class AlertWidgetTest extends TestCase
{
    public function testAlertRender()
    {
        $alert = Alert::widget([
            'type' => Alert::TYPE_SUCCESS,
            'title' => 'Alert Title!',
            'message' => 'Alert Message',
            'dismissible' => true,
        ]);

        $dom = new Crawler($alert);
        $root = $dom->filter('div.alert');
        $this->assertEquals('alert alert-success alert-dismissible', $root->attr('class'));
        $title = $root->filter('h4');
        $this->assertContains('Alert Title!', $title->text());
        $this->assertEquals('icon fa fa-check', $title->filter('i.icon')->attr('class'));
        $this->assertContains('Alert Message', $root->text());
    }

    public function testNoTitle()
    {
        $alert = Alert::widget([
            'type' => Alert::TYPE_DANGER,
            'message' => 'Alert Message',
            'dismissible' => true,
        ]);

        $dom = new Crawler($alert);
        $root = $dom->filter('div.alert');
        $this->assertEquals('alert alert-danger alert-dismissible', $root->attr('class'));
        $this->assertContains('Alert Message', $root->text());
    }
}
