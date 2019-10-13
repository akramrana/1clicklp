<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientCampaigns */

$this->title = $model->campaign_name_en;
$this->params['breadcrumbs'][] = ['label' => 'Client Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->client_campaign_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->client_campaign_id], [
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
                    'value' => $model->client->first_name . ' ' . $model->client->last_name,
                ],
                'campaign_name_en',
                'campaign_description_en:ntext',
                [
                    'attribute' => 'client_campaign_type_id',
                    'value' => $model->clientCampaignType->name_en,
                ],
                [
                    'attribute' => 'client_template_id',
                    'value' => $model->clientTemplate->name_en,
                ],
                'created_at',
                'updated_at',
                'published_at',
                [
                    'attribute' => 'is_publish',
                    'value' => ($model->is_publish == 1) ? "Published" : "Not Published"
                ],
                [
                    'attribute' => 'is_active',
                    'value' => ($model->is_active == 1) ? "Active" : "Inactive"
                ],
            ],
        ])
        ?>
        <div class="clearfix">&nbsp;</div>
        <?php
        $dataProvider = new ActiveDataProvider([
            'query' => $model->getClientCampaignUsers(),
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => ['defaultOrder' => ['client_campaign_user' => SORT_ASC]],
        ]);

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'columns' => [
                [
                    'attribute' => 'client_subscriber_id',
                    'value' => function($data) {
                        return $data->clientSubscriber->first_name . ' ' . $data->clientSubscriber->last_name;
                    }
                ],
                [
                    'label' => 'E-mail',
                    'value' => function($data) {
                        return $data->clientSubscriber->email;
                    }
                ],
                [
                    'label' => 'Phone',
                    'value' => function($data) {
                        return $data->clientSubscriber->phone;
                    }
                ],
            ],
        ]);
        ?>

    </div>

</div>
