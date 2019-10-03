<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedbacks';
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
                'name',
                'email:email',
                'phone',
                'subject',
                'message:ntext',
                [
                    'label' => 'Status',
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model, $url) {
                        return '<div class="onoffswitch">'
                                . Html::checkbox('onoffswitch', $model->status, [
                                    'class' => "onoffswitch-checkbox",
                                    'id' => "myonoffswitch" . $model->feedback_id,
                                    'onclick' => 'app.changeStatus("feedback/change-status",this,' . $model->feedback_id . ')',
                                ])
                                . '<label class="onoffswitch-label" for="myonoffswitch' . $model->feedback_id . '"></label></div>';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'status', [1 => 'Contacted', 0 => 'Not Contacted'], ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                //'is_deleted',
                ['class' => 'yii\grid\ActionColumn','template' => '{delete}'],
            ],
        ]);
        ?>


    </div>

</div>
