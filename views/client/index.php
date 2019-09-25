<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Create Clients', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'first_name',
                'last_name',
                'email:email',
                'phone',
                //'password',
                //'is_social_register',
                //'is_phone_verified',
                //'is_email_verified:email',
                //'verification_code',
                //'created_at',
                //'updated_at',
                //'newsletter_subscribed',
                [
                    'attribute' => 'type',
                    'value' => function($model) {
                        return ($model->type == "F") ? "Free" : "Premium";
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'type', ['F' => 'Free', 'P' => 'Premium'], ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                [
                    'label' => 'Status',
                    'attribute' => 'is_active',
                    'format' => 'raw',
                    'value' => function ($model, $url) {
                        return '<div class="onoffswitch">'
                                . Html::checkbox('onoffswitch', $model->is_active, [
                                    'class' => "onoffswitch-checkbox",
                                    'id' => "myonoffswitch" . $model->client_id,
                                    'onclick' => 'app.changeStatus("client/activate",this,' . $model->client_id . ')',
                                ])
                                . '<label class="onoffswitch-label" for="myonoffswitch' . $model->client_id . '"></label></div>';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'is_active', [1 => 'Active', 0 => 'Inactive'], ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                //'is_deleted',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>

    </div>
</div>
