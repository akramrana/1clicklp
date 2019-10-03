<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paymode')->dropDownList([ 'C' => 'C', 'B' => 'B', 'CC' => 'CC', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'gross_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'net_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PaymentID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'payment_date')->textInput() ?>

    <?= $form->field($model, 'transaction_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TrackID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'udf1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'udf2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'udf3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'udf4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'udf5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'T' => 'T', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
