<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TemplateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="templates-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'template_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'sub_title_en') ?>

    <?= $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'regular_price') ?>

    <?php // echo $form->field($model, 'final_price') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'raw_html_content') ?>

    <?php // echo $form->field($model, 'folder_name') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
