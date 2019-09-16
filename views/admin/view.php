<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Admins */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-primary">

    <div class="box-body">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->admin_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->admin_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'admin_id',
                'name',
                'email:email',
                //'password',
                'phone',
                'created_at',
                'updated_at',
                [
                    'attribute' => 'is_active',
                    'value' => ($model->is_active==1)?"Yes":"No"
                ],
                //'is_deleted',
            ],
        ])
        ?>

    </div>

</div>
