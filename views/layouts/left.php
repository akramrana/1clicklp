<?php

use yii\widgets\Menu;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="height: 65px;">
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
                    'items' => [
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Client List',
                            'url' => ['client/index'],
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Campaigns',
                            'url' => '#',
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Campaign Types',
                            'url' => '#',
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Campaign Users',
                            'url' => '#',
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Client Packages',
                            'url' => '#',
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Client Subscribers',
                            'url' => '#',
                        ],
                        [
                            'label' => '<i class="fa fa-circle-o"></i> Client Template',
                            'url' => '#',
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
                    'url' => '#',
                ],
                [
                    'label' => '<i class="fa fa-laptop"></i> <span>Packages</span>',
                    'url' => '#',
                ],
                [
                    'label' => '<i class="fa fa-book"></i> <span>CMS</span>',
                    'url' => '#',
                ],
                [
                    'label' => '<i class="fa fa-question-circle"></i> <span>FAQ</span>',
                    'url' => '#',
                ],
                [
                    'label' => '<i class="fa fa-envelope"></i> <span>Feedback</span>',
                    'url' => '#',
                ],
                [
                    'label' => '<i class="fa fa-credit-card"></i> <span>Payments</span>',
                    'url' => '#',
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