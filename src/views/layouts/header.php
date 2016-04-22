<?php

use yii\bootstrap\Nav;
use yii\bootstrap\Html;

?>

<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?= Html::img('/img/logo-alt.png', ['alt' => \Yii::$app->name]) ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?= Html::img('/img/logo.png', ['alt' => \Yii::$app->name]) ?></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <?= Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => $this->theme->topMenuItems
            ]); ?>
        </div>

    </nav>
</header>