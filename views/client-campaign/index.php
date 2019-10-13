<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientCampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Campaigns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
        <p>
            <?= Html::a('Create Client Campaigns', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'client_id',
                    'value' => function($model) {
                        return $model->client->first_name . ' ' . $model->client->last_name;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'client_id', app\helpers\AppHelper::getAllClients(), ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                'campaign_name_en',
                [
                    'attribute' => 'client_campaign_type_id',
                    'value' => function($model) {
                        return $model->clientCampaignType->name_en;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'client_campaign_type_id', app\helpers\AppHelper::getCampaignType(), ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                [
                    'attribute' => 'client_template_id',
                    'value' => function($model) {
                        return $model->clientTemplate->name_en;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'client_template_id', app\helpers\AppHelper::getAllClientTemplates(), ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                [
                    'label' => 'Publish Status',
                    'attribute' => 'is_publish',
                    'format' => 'raw',
                    'value' => function ($model, $url) {
                        return '<div class="onoffswitch">'
                                . Html::checkbox('onoffswitch', $model->is_publish, [
                                    'class' => "onoffswitch-checkbox",
                                    'id' => "pmyonoffswitch" . $model->client_campaign_id,
                                    'onclick' => 'app.changeStatus("client-campaign/publish",this,' . $model->client_campaign_id . ')',
                                ])
                                . '<label class="onoffswitch-label" for="pmyonoffswitch' . $model->client_campaign_id . '"></label></div>';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'is_publish', [1 => 'Published', 0 => 'Not Published'], ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                [
                    'label' => 'Status',
                    'attribute' => 'is_active',
                    'format' => 'raw',
                    'value' => function ($model, $url) {
                        return '<div class="onoffswitch">'
                                . Html::checkbox('onoffswitch', $model->is_active, [
                                    'class' => "onoffswitch-checkbox",
                                    'id' => "myonoffswitch" . $model->client_campaign_id,
                                    'onclick' => 'app.changeStatus("client-campaign/activate",this,' . $model->client_campaign_id . ')',
                                ])
                                . '<label class="onoffswitch-label" for="myonoffswitch' . $model->client_campaign_id . '"></label></div>';
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

