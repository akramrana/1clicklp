<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientTemplates */

$this->title = 'Create Client Templates';
$this->params['breadcrumbs'][] = ['label' => 'Client Templates', 'url' => ['index']];
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
