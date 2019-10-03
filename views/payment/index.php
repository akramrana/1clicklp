<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Payments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'payment_id',
            'paymode',
            'gross_amount',
            'net_amount',
            'currency_code',
            //'PaymentID',
            //'result',
            //'remark:ntext',
            //'payment_date',
            //'transaction_id',
            //'auth',
            //'ref',
            //'TrackID',
            //'udf1',
            //'udf2',
            //'udf3',
            //'udf4',
            //'udf5',
            //'status',
            //'type',
            //'type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
