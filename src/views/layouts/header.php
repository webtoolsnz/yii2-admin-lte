<?php

use yii\bootstrap\Nav;
use yii\bootstrap\Html;

?>

<header class="main-header">
    <?php if ($this->theme->layout == \webtoolsnz\AdminLte\Theme::LAYOUT_SIDEBAR_MINI) { ?>
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><?= $this->theme->showLogo ? Html::img('/img/logo-alt.png', ['alt' => \Yii::$app->name]) : \Yii::$app->name ?></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><?= $this->theme->showLogo ? Html::img('/img/logo.png', ['alt' => \Yii::$app->name]) : \Yii::$app->name  ?></span>
        </a>
    <?php } ?>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <?php if ($this->theme->layout == \webtoolsnz\AdminLte\Theme::LAYOUT_SIDEBAR_MINI) { ?>
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        <?php } ?>

        <?php if ($this->theme->layout == \webtoolsnz\AdminLte\Theme::LAYOUT_TOP_NAV) { ?>
            <a href="/" class="navbar-brand">
                <?= $this->theme->showLogo ? Html::img('/img/logo.png', ['alt' => \Yii::$app->name]) : \Yii::$app->name  ?>
            </a>
        <?php } ?>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <?= Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => $this->theme->topMenuItems
            ]); ?>
        </div>

    </nav>
</header>