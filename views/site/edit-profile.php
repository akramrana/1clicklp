<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\bootstrap\ActiveForm;

$this->title = 'Edit Profile';
//debugPrint(Yii::$app->session['_1clickLpCustomerData']);
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <?php
        echo $this->render('_my-account-nav', [
            'nav' => 'profile'
        ]);
        ?>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="profile">
                    <h2>Profile photo</h2>
                    <div class="profile_photo">
                        <?php
                        if (Yii::$app->session['_1clickLpCustomerData']['photo'] == null) {
                            $propic = BaseUrl::home() . 'ui/images/icon_design.png';
                        } else {
                            $propic = BaseUrl::home() . '/uploads/' . Yii::$app->session['_1clickLpCustomerData']['photo'];
                        }
                        ?>
                        <img id="usr-profic" src="<?= $propic; ?>" width="100" height="100">

                    </div>
                    <div class="profile_photo_upload">
                        <h3>Upload your photo</h3>
                        <p>Photo should be at least 300px x 300px</p>
                        <input accept="image/png, image/jpeg, images/gif" onchange="site.fileUpload(this)" type="file" class="btn btn-primary" id="exampleFormControlFile1">
                        <p id="profile-pic-help" class="error"></p>
                        <div id="progress" class="progress" style="display: none">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="row profile_info">
                    <div class="col-sm-6">
                        <h2>Basic information</h2>
                        <div class="profile-response"></div>
                        <?php
                        $form = ActiveForm::begin([
                                    'id' => 'edit-profile-form',
                        ]);
                        ?>

                        <?=
                        $form->field($model, 'first_name')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Full Name']);
                        ?>

                        <?=
                        $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Phone']);
                        ?>
                        
                        <?=
                        $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Phone']);
                        ?>
                        
                        <?=
                        $form->field($model, 'newsletter_subscribed')->checkbox();
                        ?>

                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>

                        <?php
                        ActiveForm::end();
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <h2>Change password</h2>
                        <div class="password-response"></div>
                        <?php
                        $form = ActiveForm::begin([
                                    'id' => 'change-pass-form',
                        ]);
                        ?>
                        
                        <?=
                        $form->field($passwordForm, 'oldPass')->passwordInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Old Password']);
                        ?>
                        
                        <?=
                        $form->field($passwordForm, 'newPass')->passwordInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'New Password']);
                        ?>
                        
                        <?=
                        $form->field($passwordForm, 'repeatNewPass')->passwordInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Confirm New Password']);
                        ?>
                        
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

                        <?php
                        ActiveForm::end();
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
$this->registerJs("$('#edit-profile-form').on('beforeSubmit', function () {
    var form = $(this);
    var formData = form.serialize();
    $('.global-loader').show();
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: formData,
        success: function (response) {
            $('.global-loader').hide();
            if(response.status==200){
                $('.profile-response').html('<div class=\"alert alert-success\">Profile successfully updated!</div>');
            }else{
                $('.profile-response').html('<div class=\"alert alert-danger\">'+response.msg+'</div>');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
           $('.global-loader').hide();
           alert(jqXHR.responseText);
        }
    });
    return false;
});", \yii\web\View::POS_END);

$this->registerJs("$('#change-pass-form').on('beforeSubmit', function () {
    var form = $(this);
    var formData = form.serialize();
    $('.global-loader').show();
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: formData,
        success: function (response) {
            $('.global-loader').hide();
            $('#change-pass-form')[0].reset();
            if(response.status==200){
                $('.password-response').html('<div class=\"alert alert-success\">Password successfully updated!</div>');
            }else{
                $('.password-response').html('<div class=\"alert alert-danger\">'+response.msg+'</div>');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
           $('.global-loader').hide();
           alert(jqXHR.responseText);
        }
    });
    return false;
});", \yii\web\View::POS_END);
