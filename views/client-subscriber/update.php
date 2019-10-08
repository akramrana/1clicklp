<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSubscribers */

$this->title = 'Update Client Subscribers: ' . $model->client_subscriber_id;
$this->params['breadcrumbs'][] = ['label' => 'Client Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client_subscriber_id, 'url' => ['view', 'id' => $model->client_subscriber_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-subscribers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
