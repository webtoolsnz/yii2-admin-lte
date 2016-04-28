<?php

namespace webtoolsnz\AdminLte\tests;

use webtoolsnz\AdminLte\AdminLteAsset;
use webtoolsnz\AdminLte\FlashMessage;
use webtoolsnz\AdminLte\Theme;
use Yii;
use Symfony\Component\DomCrawler\Crawler;

class ThemeTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        Yii::$app->view->theme = Yii::createObject([
            'class' => \webtoolsnz\AdminLte\Theme::className(),
        ]);
    }

    /**
     * This tests whether the correct CSS file is loaded and body-class is set,
     * when the `skin` property is set on the theme.
     *
     * @dataProvider skinProvider
     */
    public function testSkinClassAndCssFile($skin, $expected)
    {
        Yii::$app->view->theme->skin = $skin;

        $view = Yii::$app->getView();
        $html = $view->render('//layouts/main', ['content' => '']);

        $this->assertEquals($expected, AdminLteAsset::$skin);
        $this->assertContains('AdminLTE.min.css', $html);
        $this->assertContains("$expected.min.css", $html);

        $crawler = new Crawler($html);
        $this->assertContains($expected, $crawler->filter('body')->attr('class'));
    }

    /**
     * @return array
     */
    public function skinProvider()
    {
        return [
            [Theme::SKIN_BLACK, 'skin-black'],
            [Theme::SKIN_BLACK_LIGHT, 'skin-black-light'],
            [Theme::SKIN_BLUE, 'skin-blue'],
            [Theme::SKIN_BLUE_LIGHT, 'skin-blue-light'],
            [Theme::SKIN_GREEN, 'skin-green'],
            [Theme::SKIN_GREEN_LIGHT, 'skin-green-light'],
            [Theme::SKIN_RED, 'skin-red'],
            [Theme::SKIN_RED_LIGHT, 'skin-red-light'],
            [Theme::SKIN_YELLOW, 'skin-yellow'],
            [Theme::SKIN_YELLOW_LIGHT, 'skin-yellow-light'],
            [Theme::SKIN_PURPLE, 'skin-purple'],
            [Theme::SKIN_PURPLE_LIGHT, 'skin-purple-light'],
        ];
    }

    /**
     *
     */
    public function testPathMapGenerator()
    {
        $theme = new \webtoolsnz\AdminLte\Theme();

        $expected = ['@app/views' => ['@app/views', $theme->getPath('views')]];
        $this->assertEquals($expected, $theme->pathMap);

        $theme = new \webtoolsnz\AdminLte\Theme(['root' => '@foo']);
        $expected = ['@foo/views' => ['@foo/views', $theme->getPath('views')]];
        $this->assertEquals($expected, $theme->pathMap);
    }

    public function testTopMenu()
    {
        Yii::$app->view->theme->topMenuItems = [
            [
                'label' => 'Logout',
                'url' => '\test-logout',
                'linkOptions' => ['class' => 'test-logout']
            ],
        ];

        $view = Yii::$app->getView();
        $html = $view->render('//layouts/main', ['content' => '']);

        $crawler = new Crawler($html);

        $link = $crawler->filter('.main-header .navbar-custom-menu a.test-logout');
        $this->assertNotNull($link);
        $this->assertEquals('Logout', $link->text());
    }

    public function testMainMenu()
    {
        Yii::$app->view->theme->mainMenuItems = [
            ['label' => 'Home', 'url' => '/home/'],
        ];

        $view = Yii::$app->getView();
        $html = $view->render('//layouts/main', ['content' => '']);

        $crawler = new Crawler($html);

        $link = $crawler->filter('.main-sidebar .sidebar-menu a[href="/home/"] ');
        $this->assertNotNull($link);
        $this->assertContains('Home', $link->text());
    }

    public function testContentHeader()
    {
        $view = Yii::$app->getView();
        $content = $view->render('@tests/views/content-header-test');
        $html = $view->render('//layouts/main', ['content' => $content]);
        $crawler = new Crawler($html);

        $header = $crawler->filter('.content-wrapper .content-header > h1');
        $this->assertNotNull($header);
        $this->assertContains('This is a test page', $header->text());

        $breadcrumbs = $crawler->filter('.content-wrapper .content-header .breadcrumb');
        $this->assertNotNull($breadcrumbs);

        $crumb = $breadcrumbs->filter('li')->eq(0);

        $this->assertNotNull($crumb);
        $this->assertContains('Home', $crumb->text());

        $crumb = $breadcrumbs->filter('li')->eq(1);

        $this->assertNotNull($crumb);
        $this->assertContains('crumbs', $crumb->text());
    }

    public function testFlashMessages()
    {
        Yii::$app->session->setFlash('test', new FlashMessage([
            'message' => 'This is a test flash message'
        ]));

        $view = Yii::$app->getView();
        $html = $view->render('//layouts/main', ['content' => 'Testing']);
        $crawler = new Crawler($html);
        $crawler->filter('section.content')->html();

        $this->assertContains('This is a test flash message', $crawler->filter('section.content')->text());
    }
}
