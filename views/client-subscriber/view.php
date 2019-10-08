<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSubscribers */

$this->title = $model->client_subscriber_id;
$this->params['breadcrumbs'][] = ['label' => 'Client Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-subscribers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->client_subscriber_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->client_subscriber_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'client_subscriber_id',
            'client_id',
            'client_template_id',
            'first_name',
            'last_name',
            'email:email',
            'phone',
            'message:ntext',
            'ip_address',
            'location',
            'created_at',
            'updated_at',
            'is_active',
            'is_deleted',
        ],
    ]) ?>

</div>
