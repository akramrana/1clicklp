<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSubscribers */
/* @var $form yii\widgets\ActiveForm */
$clientTemplates = [];
if(!$model->isNewRecord){
    $clientTemplates = app\helpers\AppHelper::getClientTemplatesById($model->client_id);
}
?>

<div class="client-subscribers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->dropDownList(app\helpers\AppHelper::getAllClients(),[
        'prompt' => 'Please Select',
        'onchange' => 'app.getClientTemplate(this.value)'
    ]) ?>

    <?= $form->field($model, 'client_template_id')->dropDownList($clientTemplates,[
        'prompt' => 'Please Select'
    ]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
