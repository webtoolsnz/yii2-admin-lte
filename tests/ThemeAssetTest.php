<?php

namespace webtoolsnz\AdminLte\tests;

use Yii;
use webtoolsnz\AdminLte\ThemeAsset;
use yii\web\AssetBundle;

class ThemeAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = Yii::$app->getView();
        $this->assertEmpty($view->assetBundles);

        ThemeAsset::register($view);

        $this->assertEquals(7, count($view->assetBundles));
        $this->assertArrayHasKey('webtoolsnz\\AdminLte\\ThemeAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['webtoolsnz\\AdminLte\\ThemeAsset'] instanceof AssetBundle);

        $content = $view->renderFile('@tests/views/layouts/raw.php');

        $this->assertContains('font-awesome.min.css', $content);
        $this->assertContains('AdminLTE.min.css', $content);
        $this->assertContains('bootstrap.css', $content);
        $this->assertContains('overrides.css', $content);
        $this->assertContains('jquery.js', $content);
        $this->assertContains('yii.js', $content);
        $this->assertContains('bootstrap.js', $content);
        $this->assertContains('app.min.js', $content);
    }
}
