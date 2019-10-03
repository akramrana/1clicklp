<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cms */

$this->title = 'Update Cms: ' . $model->title_en;
$this->params['breadcrumbs'][] = ['label' => 'Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title_en, 'url' => ['view', 'id' => $model->cms_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-primary">

    <div class="box-body">

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>
</div>
