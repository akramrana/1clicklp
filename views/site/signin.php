<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\bootstrap\ActiveForm;

$this->title = 'Signin';
?>

<section id="login_page" class="section_padding">
    <div class="container">
        <div class="main_round_box"> 
            <div class="row">
                <div class="col-sm-5">
                    <div class="left_blue_box section_headline">
                        <h1>Sign In to XYZ</h1>
                        <ul>
                            <li><a href="#" ><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>	
                        </ul>
                        <a href="#" class="sign_email_txt">or use your email account</a>
                        <?php
                        $form = ActiveForm::begin([
                                    'id' => 'login-form',
                        ]);
                        ?>
                        
                        <?=
                        $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Enter email'])->label(false)
                        ?>
                        
                        
                        <?=
                        $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Password'])->label(false)
                        ?>
                        
                        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary prpl_btn']) ?>
                        
                        <div class="form-group">
                            <a href="#" class="form-check-label" for="exampleCheck1">Forgot your password?</a>
                        </div>
                        
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="right_wt_box section_headline">
                        <h1>Sign Up for <b>FREE</b></h1>
                        <p>Enter your personal details<br>and start journy with us.</p>
                        <a href="<?= Url::to(['site/signup']); ?>" class="btn btn-primary prpl_btn">Sign Up</a>

                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>