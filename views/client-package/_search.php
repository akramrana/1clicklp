<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientPackageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-packages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'client_package_id') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'package_id') ?>

    <?= $form->field($model, 'package_number') ?>

    <?= $form->field($model, 'purchase_date') ?>

    <?php // echo $form->field($model, 'expiry_date') ?>

    <?php // echo $form->field($model, 'is_paid') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'max_templates') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
