<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientCampaignTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Campaign Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Create Campaign Types', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'client_campaign_type_id',
                [
                    'attribute' => 'client_id',
                    'value' => function($model) {
                        return $model->client->first_name.' '.$model->client->last_name;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'client_id', app\helpers\AppHelper::getAllClients(), ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                'name_en',
                //'created_at',
                //'updated_at',
                [
                    'label' => 'Status',
                    'attribute' => 'is_active',
                    'format' => 'raw',
                    'value' => function ($model, $url) {
                        return '<div class="onoffswitch">'
                                . Html::checkbox('onoffswitch', $model->is_active, [
                                    'class' => "onoffswitch-checkbox",
                                    'id' => "myonoffswitch" . $model->client_campaign_type_id,
                                    'onclick' => 'app.changeStatus("client-campaign-type/activate",this,' . $model->client_campaign_type_id . ')',
                                ])
                                . '<label class="onoffswitch-label" for="myonoffswitch' . $model->client_campaign_type_id . '"></label></div>';
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
