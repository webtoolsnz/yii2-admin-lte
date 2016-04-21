<aside class="main-sidebar">

    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?= \app\themes\AdminLte\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'items' => method_exists($this->context->module, 'getMenuItems') ?
                $this->context->module->getMenuItems($this->context) : [],
        ]) ?>
    </section>
    <!-- /.sidebar -->
</aside>