<?php
namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\widgets\Menu;

class MenuWidgetTest extends TestCase
{
    public function testBasicMenuHtml()
    {
        $html = Menu::widget([
            'options' => ['class' => 'menu-class'],
            'items' => [
                [
                    'icon' => 'glyphicon glyphicon-home',
                    'label' => 'Dashboard',
                    'url' => ['/admin/'],
                    'active' => true,
                ],
                [
                    'icon' => 'glyphicon glyphicon-user',
                    'label' => 'Users',
                    'url' => ['/admin/user'],
                    'active' => false,
                ],
            ]
        ]);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/data/basic-menu.html', $html);
    }

    public function testMenuWithSubItemsHtml()
    {
        $html = Menu::widget([
            'options' => ['class' => 'menu-class'],
            'items' => [
                ['label' => 'Heading Example'],
                [
                    'label' => 'Level 1',
                    'active' => false,
                    'items' => [
                        [
                            'label' => 'Level 2',
                            'url' => '/level2',
                        ],
                        [
                            'label' => 'More',
                            'items' => [
                                [
                                    'icon' => 'glyphicon glyphicon-home',
                                    'label' => 'Level 3',
                                    'url' => '/level3',
                                    'active' => true,
                                ],
                            ]
                        ],
                    ]
                ],
            ]
        ]);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/data/multilevel-menu.html', $html);
    }
}
