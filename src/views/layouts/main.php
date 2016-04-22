<?php
/**
 * @var $this \yii\web\View
 * @var $content string
 */

use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;
use webtoolsnz\AdminLte\ThemeAsset;

ThemeAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="text/html;charset=<?= Yii::$app->charset ?>" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body class="hold-transition <?= $this->theme->skin ?> sidebar-mini">
<div class="wrapper">

    <!-- header -->
    <?= $this->render('//layouts/header') ?>

    <!-- Sidebar -->
    <?= $this->render('//layouts/sidebar') ?>

    <?php $this->beginBody() ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= Html::encode($this->title) ?>
            </h1>

            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Home',
                    'url' => '/' . ($this->context ? $this->context->module->id : null),
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

        </section>

        <!-- Main content -->
        <section class="content">
            <?= $content ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->endBody() ?>

    <?= $this->render('//layouts/footer') ?>

</div>
<!-- ./wrapper -->
</body>
</html>
<?php $this->endPage() ?>
