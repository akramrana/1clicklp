<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientPackages */

$this->title = 'Create Client Packages';
$this->params['breadcrumbs'][] = ['label' => 'Client Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-packages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
