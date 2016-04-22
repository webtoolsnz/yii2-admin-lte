<?php

namespace webtoolsnz\AdminLte\tests;

use Yii;
use webtoolsnz\AdminLte\AdminLteAsset;
use yii\web\AssetBundle;

class AdminLteAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = Yii::$app->getView();
        $this->assertEmpty($view->assetBundles);

        AdminLteAsset::register($view);

        $this->assertArrayHasKey('webtoolsnz\\AdminLte\\AdminLteAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['webtoolsnz\\AdminLte\\AdminLteAsset'] instanceof AssetBundle);

        $content = $view->renderFile('@tests/views/layouts/raw.php');

        $this->assertContains('AdminLTE.min.css', $content);
        $this->assertContains('app.min.js', $content);
    }
}
