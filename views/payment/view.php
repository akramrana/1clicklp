<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Payments */

$this->title = $model->payment_id;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->payment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->payment_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'payment_id',
            'paymode',
            'gross_amount',
            'net_amount',
            'currency_code',
            'PaymentID',
            'result',
            'remark:ntext',
            'payment_date',
            'transaction_id',
            'auth',
            'ref',
            'TrackID',
            'udf1',
            'udf2',
            'udf3',
            'udf4',
            'udf5',
            'status',
            'type',
            'type_id',
        ],
    ]) ?>

</div>
