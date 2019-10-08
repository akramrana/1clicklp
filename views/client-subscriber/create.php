<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSubscribers */

$this->title = 'Create Client Subscribers';
$this->params['breadcrumbs'][] = ['label' => 'Client Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-subscribers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
