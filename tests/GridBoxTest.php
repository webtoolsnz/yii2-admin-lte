<?php
namespace webtoolsnz\AdminLte\tests;

use Symfony\Component\DomCrawler\Crawler;
use webtoolsnz\AdminLte\widgets\GridBox;
use yii\bootstrap\Html;
use yii\data\ArrayDataProvider;

class GridBoxTest extends TestCase
{
    public function gridDataProvider()
    {
        $records = [
            [
                'id' => 1,
                'username' => 'foo',
                'email' => 'foo@mail.com',
            ],
            [
                'id' => 2,
                'username' => 'bar',
                'email' => 'bar@mail.com',
            ],
            [
                'id' => 3,
                'username' => 'baz',
                'email' => 'baz@mail.com',
            ]
        ];

        return [
            [new ArrayDataProvider(['allModels' => $records])]
        ];
    }

    /**
     * @dataProvider gridDataProvider
     */
    public function testGridBoxRender($dataProvider)
    {
        $grid = GridBox::widget([
            'id' => 'gridbox-test-id',
            'tools' => Html::tag('span', 'abc123', ['class' => '.tool-test']),
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                [
                    'attribute' => 'username',
                    'contentOptions' => ['class' => 'username']
                ],
                'email',
            ],
        ]);


        $dom = new Crawler($grid);

        $root = $dom->filter('div#gridbox-test-id');

        $this->assertEquals('gridbox-test-id', $root->attr('id'));
        $this->assertEquals('grid-view box box-default', $root->attr('class'));

        $header = $root->filter('div.box-header');
        $tools = $header->filter('div.box-tools');
        $this->assertContains('abc123', $tools->text());

        $body = $root->filter('div.box-body');
        $this->assertEquals('box-body no-padding', $body->attr('class'));

        $this->assertNotNull($body->filter('table.table')->eq(0));

        $this->assertEquals('bar', $body->filter('tr[data-key="1"] td.username')->text());

        $footer = $header = $root->filter('div.box-footer');
        $this->assertContains('Showing 1-3 of 3 items.', $footer->text());
    }
}
