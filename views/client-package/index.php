<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientPackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Packages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <div class="box-body">

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
                [
                    'attribute' => 'package_id',
                    'value' => function($model) {
                        return $model->package->name_en;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'package_id', app\helpers\AppHelper::getAllPackages(), ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                'package_number',
                'purchase_date',
                'expiry_date',
                [
                    'attribute' => 'is_paid',
                    'value' => function($model){
                        return ($model->is_paid == 1) ? "Yes" : "No";
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'is_paid', [1 => 'Yes', 0 => 'No'], ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                'price',
                //'max_templates',
                //'created_at',
                //'updated_at',
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
            ],
        ]);
        ?>


    </div>

</div>
