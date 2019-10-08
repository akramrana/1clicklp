<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Create Templates', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'template_id',
                [
                    'attribute' => 'image',
                    'value' => function($model) {
                        if ($model->image != "") {
                            return yii\helpers\Url::to(['uploads/' . $model->image]);
                        } else {
                            return "";
                        }
                    },
                    'format' => ['image', ['width' => '128']],
                    'filter' => false,
                ],
                [
                    'attribute' => 'category_id',
                    'value' => function($model) {
                        return $model->category->name_en;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'category_id', app\helpers\AppHelper::getAllCategories(), ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                'title_en',
                'sub_title_en',
                'regular_price',
                'final_price',
                [
                    'attribute' => 'type',
                    'value' => function($model) {
                        return ($model->type == "F") ? "Free" : "Premium";
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'type', ['F' => 'Free', 'P' => 'Premium'], ['class' => 'form-control', 'prompt' => 'Filter']),
                ],
                //'raw_html_content:ntext',
                //'folder_name',
                //'created_at',
                //'updated_at',
                [
                    'label' => 'Status',
                    'attribute' => 'is_active',
                    'format' => 'raw',
                    'value' => function ($model, $url) {
                        return '<div class="onoffswitch">'
                                . Html::checkbox('onoffswitch', $model->is_active, [
                                    'class' => "onoffswitch-checkbox",
                                    'id' => "myonoffswitch" . $model->template_id,
                                    'onclick' => 'app.changeStatus("template/activate",this,' . $model->template_id . ')',
                                ])
                                . '<label class="onoffswitch-label" for="myonoffswitch' . $model->template_id . '"></label></div>';
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