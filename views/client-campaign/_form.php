<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\ClientCampaigns */
/* @var $form yii\widgets\ActiveForm */
$campaignTypes = [];
$clientTemplates = [];
if(!$model->isNewRecord){
    $clientTemplates = app\helpers\AppHelper::getClientTemplatesById($model->client_id);
    $campaignTypes = app\helpers\AppHelper::getClientCampaignTypesById($model->client_id);
}
?>

<div class="client-campaigns-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'client_id')->dropDownList(app\helpers\AppHelper::getAllClients(),[
        'prompt' => 'Please Select',
        'class' => 'form-control',
        'onclick' => 'app.getCampaignTypesTemplates(this.value)'
    ]) ?>
    
    <?= $form->field($model, 'client_campaign_type_id')->dropDownList($campaignTypes,[
        'prompt' => 'Please Select',
        'class' => 'form-control'
    ]) ?>
    
    <?= $form->field($model, 'client_template_id')->dropDownList($clientTemplates,[
        'prompt' => 'Please Select',
        'class' => 'form-control'
    ]) ?>
    
    
    <?= $form->field($model, 'campaign_name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campaign_description_en')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
