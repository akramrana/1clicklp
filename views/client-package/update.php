<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientPackages */

$this->title = 'Update Client Packages: ' . $model->client_package_id;
$this->params['breadcrumbs'][] = ['label' => 'Client Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client_package_id, 'url' => ['view', 'id' => $model->client_package_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-packages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
