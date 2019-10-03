<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <div class="box-body">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'paymode',
                    'value' => function($model) {
                        return app\helpers\AppHelper::getPaymodeName($model->paymode);
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'paymode', app\helpers\AppHelper::getPaymodes(), ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                'gross_amount',
                //'net_amount',
                //'currency_code',
                'PaymentID',
                'result',
                //'remark:ntext',
                'payment_date',
                'transaction_id',
                'auth',
                'ref',
                'TrackID',
                //'udf1',
                //'udf2',
                //'udf3',
                //'udf4',
                //'udf5',
                //'status',
                [
                    'attribute' => 'type',
                    'value' => function($model) {
                        return ($model->type == 'T') ? "Template" : "Package";
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'type', ['T' => 'Template', 'P' => 'Package'], ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                [
                    'attribute' => 'type_id',
                    'value' => function($model){
                        if($model->type=='T'){
                            $data = \app\models\Templates::findOne($model->type_id);
                            $title = !empty($data)?$data->title_en:"";
                        }else{
                            $data = \app\models\Packages::findOne($model->type_id);
                            $title = !empty($data)?$data->name_en:"";
                        }
                        return $title;
                    },
                    'filter' => false
                ],
            ],
        ]);
        ?>


    </div>


</div>