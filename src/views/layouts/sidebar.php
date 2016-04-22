<aside class="main-sidebar">

    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?= \webtoolsnz\AdminLte\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'items' => $this->theme->mainMenuItems
        ]) ?>
    </section>
    <!-- /.sidebar -->
</aside>