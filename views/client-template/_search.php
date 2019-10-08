<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientTemplateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-templates-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'client_template_id') ?>

    <?= $form->field($model, 'template_id') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'page_title_en') ?>

    <?php // echo $form->field($model, 'raw_html_content') ?>

    <?php // echo $form->field($model, 'publish_url') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'published_at') ?>

    <?php // echo $form->field($model, 'is_published') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
