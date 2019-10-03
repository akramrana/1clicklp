<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = 'Update Faq: ' . $model->question_en;
$this->params['breadcrumbs'][] = ['label' => 'Faqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->question_en, 'url' => ['view', 'id' => $model->faq_id]];
$this->params['breadcrumbs'][] = 'Update';
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
