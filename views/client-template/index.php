<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientTemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Create Client Templates', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'client_template_id',
                [
                    'attribute' => 'template_id',
                    'value' => function($model) {
                        return $model->template->title_en;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'template_id', app\helpers\AppHelper::getAllTemplates(), ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                [
                    'attribute' => 'client_id',
                    'value' => function($model) {
                        return $model->client->first_name . ' ' . $model->client->last_name;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'client_id', app\helpers\AppHelper::getAllClients(), ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                'name_en',
                'page_title_en:ntext',
                //'raw_html_content:ntext',
                'publish_url:url',
                //'created_at',
                //'updated_at',
                //'published_at',
                [
                    'label' => 'Publish Status',
                    'attribute' => 'is_published',
                    'format' => 'raw',
                    'value' => function ($model, $url) {
                        return '<div class="onoffswitch">'
                                . Html::checkbox('onoffswitch', $model->is_published, [
                                    'class' => "onoffswitch-checkbox",
                                    'id' => "pmyonoffswitch" . $model->client_template_id,
                                    'onclick' => 'app.changeStatus("client-template/publish",this,' . $model->client_template_id . ')',
                                ])
                                . '<label class="onoffswitch-label" for="pmyonoffswitch' . $model->client_template_id . '"></label></div>';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'is_published', [1 => 'Published', 0 => 'Not Published'], ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                [
                    'label' => 'Status',
                    'attribute' => 'is_active',
                    'format' => 'raw',
                    'value' => function ($model, $url) {
                        return '<div class="onoffswitch">'
                                . Html::checkbox('onoffswitch', $model->is_active, [
                                    'class' => "onoffswitch-checkbox",
                                    'id' => "myonoffswitch" . $model->client_template_id,
                                    'onclick' => 'app.changeStatus("client-template/activate",this,' . $model->client_template_id . ')',
                                ])
                                . '<label class="onoffswitch-label" for="myonoffswitch' . $model->client_template_id . '"></label></div>';
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
