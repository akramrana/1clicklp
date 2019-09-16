<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <div class="box-body">

                <p>
                    <?= Html::a('Create Admins', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'admin_id',
                        'name',
                        'email:email',
                        //'password',
                        'phone',
                        //'created_at',
                        //'updated_at',
                        //'is_active',
                        //'is_deleted',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>


            </div>
        </div>
