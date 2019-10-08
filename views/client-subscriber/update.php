<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSubscribers */

$this->title = 'Update Client Subscribers: ' . $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Client Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name.' '.$model->last_name, 'url' => ['view', 'id' => $model->client_subscriber_id]];
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
