<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSubscribers */

$this->title = $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Client Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->client_subscriber_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->client_subscriber_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'client_id',
                    'value' => $model->client->first_name.' '.$model->client->last_name,
                ],
                [
                    'attribute' => 'client_template_id',
                    'value' => $model->clientTemplate->name_en,
                ],
                'first_name',
                'last_name',
                'email:email',
                'phone',
                'message:ntext',
                'ip_address',
                'location',
                'created_at',
                'updated_at',
                [
                    'attribute' => 'is_active',
                    'value' => ($model->is_active==1)?"Active":"Inactive"
                ],
            ],
        ])
        ?>

    </div>
</div>