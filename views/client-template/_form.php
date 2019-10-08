<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientTemplates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-templates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'template_id')->dropDownList(app\helpers\AppHelper::getAllTemplates(),[
        'prompt' => 'Please Select'
    ]) ?>

    <?= $form->field($model, 'client_id')->dropDownList(app\helpers\AppHelper::getAllClients(),[
        'prompt' => 'Please Select'
    ]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page_title_en')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
