<?php

namespace webtoolsnz\AdminLte\tests;

use Yii;
use webtoolsnz\AdminLte\FontAwesomeAsset;
use yii\web\AssetBundle;

class FontAwesomeAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = Yii::$app->getView();
        $this->assertEmpty($view->assetBundles);

        FontAwesomeAsset::register($view);

        $this->assertEquals(1, count($view->assetBundles));
        $this->assertArrayHasKey('webtoolsnz\\AdminLte\\FontAwesomeAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['webtoolsnz\\AdminLte\\FontAwesomeAsset'] instanceof AssetBundle);

        $content = $view->renderFile('@tests/views/layouts/raw.php');
        $this->assertContains('font-awesome.min.css', $content);
    }
}
