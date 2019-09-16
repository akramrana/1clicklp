<?php

use app\widgets\Alert;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $this->title; ?>
        </h1>
        <?=
        Breadcrumbs::widget([
            'tag' => 'ol',
            'homeLink' => [
                'label' => '<i class="fa fa-home"></i>' . Html::encode(Yii::t('yii', 'Home')),
                'url' => Yii::$app->homeUrl,
                'encode' => false
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>
    </section>

    <!-- Main content -->
    <section class="content">

        <?= Alert::widget() ?>
        <?= $content ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->