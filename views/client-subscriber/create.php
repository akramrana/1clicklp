<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSubscribers */

$this->title = 'Create Client Subscribers';
$this->params['breadcrumbs'][] = ['label' => 'Client Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <div class="box-body">

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>

</div>
