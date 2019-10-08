<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSubscriberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Subscribers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-subscribers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Client Subscribers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'client_subscriber_id',
            'client_id',
            'client_template_id',
            'first_name',
            'last_name',
            //'email:email',
            //'phone',
            //'message:ntext',
            //'ip_address',
            //'location',
            //'created_at',
            //'updated_at',
            //'is_active',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
