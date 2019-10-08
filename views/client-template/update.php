<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientTemplates */

$this->title = 'Update Client Templates: ' . $model->page_title_en;
$this->params['breadcrumbs'][] = ['label' => 'Client Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->page_title_en, 'url' => ['view', 'id' => $model->client_template_id]];
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
