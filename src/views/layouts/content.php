<?php
/**
 * @var $this \yii\web\View
 * @var $content string
 */

use webtoolsnz\AdminLte\widgets\FlashMessages;

?>
<section class="content">
    <?= FlashMessages::widget() ?>

    <?= $content ?>
</section>