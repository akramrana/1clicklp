<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUpload;

/* @var $this yii\web\View */
/* @var $model app\models\Templates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="templates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(app\helpers\AppHelper::getAllCategories(),[
        'prompt' => 'Please Select',
    ]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_title_en')->textInput(['maxlength' => true]) ?>

    
    <label>
        Template Image (960 X 645)
    </label>
    <br/>

    <?php
    echo FileUpload::widget([
        'name' => 'Template[image]',
        'url' => [
            'upload/common?attribute=Template[image]'
        ],
        'options' => [
            'accept' => 'image/*',
        ],
        'clientOptions' => [
            'dataType' => 'json',
            'maxFileSize' => 2000000,
        ],
        'clientEvents' => [
            'fileuploadprogressall' => "function (e, data) {
                                        var progress = parseInt(data.loaded / data.total * 100, 10);
                                        $('#progress').show();
                                        $('#progress .progress-bar').css(
                                            'width',
                                            progress + '%'
                                        );
                                     }",
            'fileuploaddone' => 'function (e, data) {
                                        if(data.result.files.error==""){
                                            
                                            var img = \'<br/><img id="bannerImg" class="img-responsive" src="' . yii\helpers\BaseUrl::home() . 'uploads/\'+data.result.files.name+\'" alt="img" style="width:256px;"/>\';
                                            $("#logo_preview").html(img);
                                            $(".field-templates-image input[type=hidden]").val(data.result.files.name);
                                            $("#progress .progress-bar").attr("style","width: 0%;");
                                            $("#progress").hide();
                                            $("#progress .progress-bar").attr("style","width: 0%;");
                                        }
                                        else{
                                           $("#progress .progress-bar").attr("style","width: 0%;");
                                           $("#progress").hide();
                                           var errorHtm = \'<span style="color:#dd4b39">\'+data.result.files.error+\'</span>\';
                                           $("#logo_preview").html(errorHtm);
                                           setTimeout(function(){
                                               $("#logo_preview span").remove();
                                           },3000)
                                        }
                                    }',
        ],
    ]);
    ?>
    <div id="progress" class="progress m-t-xs full progress-small" style="display: none;">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <div id="logo_preview">
        <?php
        if (!$model->isNewRecord) {
            if ($model->image != "") {
                ?>
                <br/><img src="<?php echo yii\helpers\Url::to(['uploads/' . $model->image]) ?>" alt="img" style="width:256px;"/>
                <?php
            }
        }
        ?>
    </div>

    <?php echo $form->field($model, 'image')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'regular_price')->textInput() ?>

    <?= $form->field($model, 'final_price')->textInput() ?>

    <?=
    $form->field($model, 'type')->dropDownList(['F' => 'Free', 'P' => 'Premium',], [
        'prompt' => 'Please Select'
    ])
    ?>

    <?= $form->field($model, 'raw_html_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'folder_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
