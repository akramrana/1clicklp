<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientCampaignTypes */

$this->title = 'Update Campaign Types: ' . $model->name_en;
$this->params['breadcrumbs'][] = ['label' => 'Client Campaign Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_en , 'url' => ['view', 'id' => $model->client_campaign_type_id]];
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
