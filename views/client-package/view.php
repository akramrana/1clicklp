<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClientPackages */

$this->title = $model->package_number;
$this->params['breadcrumbs'][] = ['label' => 'Client Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-primary">

    <div class="box-body">

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'client_id',
                    'value' => $model->client->first_name.' '.$model->client->last_name,
                ],
                [
                    'attribute' => 'package_id',
                    'value' => $model->package->name_en,
                ],
                'package_number',
                'purchase_date',
                'expiry_date',
                [
                    'attribute' => 'is_paid',
                    'value' => ($model->is_paid == 1) ? "Yes" : "No"
                ],
                'max_templates',
                'created_at',
                'updated_at',
            ],
        ])
        ?>

    </div>

</div>
