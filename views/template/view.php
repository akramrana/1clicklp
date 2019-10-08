<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Templates */

$this->title = $model->title_en;
$this->params['breadcrumbs'][] = ['label' => 'Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->template_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->template_id], [
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
                //'template_id',
                [
                    'attribute' => 'category_id',
                    'value' => $model->category->name_en,
                ],
                'title_en',
                'sub_title_en',
                [
                    'attribute' => 'image',
                    'value' => yii\helpers\Url::to(['uploads/' . $model->image]),
                    'format' => ['image', ['width' => '96']],
                ],
                'regular_price',
                'final_price',
                [
                    'attribute' => 'type',
                    'value' => ($model->type == "F") ? "Free" : "Premium",
                ],
                //'raw_html_content:ntext',
                'folder_name',
                'created_at',
                'updated_at',
                [
                    'attribute' => 'is_active',
                    'value' => ($model->is_active == 1) ? "Active" : "Inactive"
                ],
            //'is_deleted',
            ],
        ])
        ?>

    </div>

</div>
