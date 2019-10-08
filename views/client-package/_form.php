<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientPackages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-packages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'package_id')->textInput() ?>

    <?= $form->field($model, 'package_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purchase_date')->textInput() ?>

    <?= $form->field($model, 'expiry_date')->textInput() ?>

    <?= $form->field($model, 'is_paid')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'max_templates')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
