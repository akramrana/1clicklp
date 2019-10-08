<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientTemplates */

$this->title = $model->page_title_en;
$this->params['breadcrumbs'][] = ['label' => 'Client Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->client_template_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->client_template_id], [
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
                [
                    'attribute' => 'template_id',
                    'value' => $model->template->title_en,
                ],
                [
                    'attribute' => 'client_id',
                    'value' => $model->client->first_name.' '.$model->client->last_name,
                ],
                'name_en',
                'page_title_en:ntext',
                //'raw_html_content:ntext',
                'publish_url:url',
                'created_at',
                'updated_at',
                'published_at',
                [
                    'attribute' => 'is_published',
                    'value' => ($model->is_published==1)?"Published":"Not Published"
                ],
                [
                    'attribute' => 'is_active',
                    'value' => ($model->is_active==1)?"Active":"Inactive"
                ],
            ],
        ])
        ?>

    </div>

</div>