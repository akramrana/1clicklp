<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */

$this->title = $model->first_name . ' ' . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->client_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->client_id], [
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
                'first_name',
                'last_name',
                'email:email',
                'phone',
                //'password',
                [
                    'attribute' => 'is_social_register',
                    'value' => ($model->is_social_register==1)?"Yes":"No"
                ],
                [
                    'attribute' => 'is_phone_verified',
                    'value' => ($model->is_phone_verified==1)?"Yes":"No"
                ],
                [
                    'attribute' => 'is_email_verified',
                    'value' => ($model->is_email_verified==1)?"Yes":"No"
                ],
                'verification_code',
                'created_at',
                'updated_at',
                [
                    'attribute' => 'newsletter_subscribed',
                    'value' => ($model->newsletter_subscribed==1)?"Yes":"No"
                ],
                [
                    'attribute' => 'type',
                    'value' => ($model->type == "F") ? "Free" : "Premium",
                ],
                [
                    'attribute' => 'is_active',
                    'value' => ($model->is_active==1)?"Active":"Inactive"
                ],
            ],
        ])
        ?>

    </div>

</div>