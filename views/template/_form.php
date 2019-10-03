<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Templates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="templates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regular_price')->textInput() ?>

    <?= $form->field($model, 'final_price')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'F' => 'F', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'raw_html_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'folder_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <?= $form->field($model, 'is_deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
