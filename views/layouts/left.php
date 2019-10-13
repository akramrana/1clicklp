<?php

use yii\widgets\Menu;

$controller = $this->context->action->controller->id;
$method = $this->context->action->id;
$current_action = $controller . '/' . $method;
$get = Yii::$app->request->queryParams;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="height: 65px;">
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->name; ?></p>
                <a href="<?php echo \yii\helpers\Url::to(['site/edit-profile']) ?>"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
        echo Menu::widget([
            'encodeLabels' => false,
            'items' => [
                [
                    'label' => 'MAIN NAVIGATION',
                    'template' => '{label}',
                    'options' => [
                        'class' => 'header',
                    ],
                ],
                [
                    'label' => '<i class="fa fa-dashboard"></i> <span>Dashboard</span>',
                    'url' => ['/site/index'],
                ],
                [
                    'label' => '<i class="fa fa-users"></i> <span>Clients</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>',
                    'template' => '<a href="#" >{label}</a>',
                    'active' => ($controller == 'client' || $controller == 'client-campaign' || $controller == 'client-campaign-type' || $controller=='client-package' || $controller=='client-subscriber' || $controller=='client-template') ? true : "",
                    'items' => [
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Client List',
                            'url' => ['client/index'],
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Campaigns',
                            'url' => ['client-campaign/index'],
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Campaign Types',
                            'url' => ['client-campaign-type/index'],
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Client Packages',
                            'url' => ['client-package/index'],
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Client Subscribers',
                            'url' => ['client-subscriber/index'],
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Client Template',
                            'url' => ['client-template/index'],
                        ],
                    ],
                    'options' => [
                        'class' => 'treeview',
                    ],
                ],
                [
                    'label' => '<i class="fa fa-th"></i> <span>Categories</span>',
                    'url' => ['/category/index'],
                ],
                [
                    'label' => '<i class="fa fa-clone"></i> <span>Templates</span>',
                    'url' => ['/template/index'],
                ],
                [
                    'label' => '<i class="fa fa-laptop"></i> <span>Packages</span>',
                    'url' => ['/package/index'],
                ],
                [
                    'label' => '<i class="fa fa-book"></i> <span>CMS</span>',
                    'url' => ['/cms/index'],
                ],
                [
                    'label' => '<i class="fa fa-question-circle"></i> <span>FAQ</span>',
                    'url' => ['/faq/index'],
                ],
                [
                    'label' => '<i class="fa fa-envelope"></i> <span>Feedback</span>',
                    'url' => ['/feedback/index'],
                ],
                [
                    'label' => '<i class="fa fa-credit-card"></i> <span>Payments</span>',
                    'url' => ['/payment/index'],
                ],
                [
                    'label' => '<i class="fa fa-users"></i> <span>Admins</span>',
                    'url' => ['admin/index'],
                ],
            ],
            'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
            'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
        ]);
        ?>

    </section>
    <!-- /.sidebar -->
</aside>