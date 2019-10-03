<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'payment_id') ?>

    <?= $form->field($model, 'paymode') ?>

    <?= $form->field($model, 'gross_amount') ?>

    <?= $form->field($model, 'net_amount') ?>

    <?= $form->field($model, 'currency_code') ?>

    <?php // echo $form->field($model, 'PaymentID') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'payment_date') ?>

    <?php // echo $form->field($model, 'transaction_id') ?>

    <?php // echo $form->field($model, 'auth') ?>

    <?php // echo $form->field($model, 'ref') ?>

    <?php // echo $form->field($model, 'TrackID') ?>

    <?php // echo $form->field($model, 'udf1') ?>

    <?php // echo $form->field($model, 'udf2') ?>

    <?php // echo $form->field($model, 'udf3') ?>

    <?php // echo $form->field($model, 'udf4') ?>

    <?php // echo $form->field($model, 'udf5') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
