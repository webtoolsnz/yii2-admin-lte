<?php
/**
 * @var $this \yii\web\View
 * @var $content string
 */

use webtoolsnz\AdminLte\ThemeAsset;

ThemeAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<?= $this->render('//layouts/head') ?>

<body class="hold-transition <?= $this->theme->skin ?> sidebar-mini">
<div class="wrapper">

    <!-- Header Begin -->
    <?= $this->render('//layouts/header') ?>
    <!-- Header Begin -->

    <!-- Sidebar Begin -->
    <?= $this->render('//layouts/sidebar') ?>
    <!-- Sidebar End -->

    <?php $this->beginBody() ?>
    <div class="content-wrapper">
        <!-- Content Header Begin -->
        <?= $this->render('//layouts/content-header') ?>
        <!-- Content Header End -->

        <!-- Content Begin -->
        <section class="content">
            <?= $content ?>
        </section>
        <!-- Content End -->
    </div>
    <?php $this->endBody() ?>

    <!-- Footer Begin -->
    <?= $this->render('//layouts/footer') ?>
    <!-- Footer End -->
</div>
</body>
</html>
<?php $this->endPage() ?>
