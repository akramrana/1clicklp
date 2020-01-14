<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\widgets\ActiveForm;

$this->title = 'Signup';
?>
<section id="login_page" class="section_padding">
    <div class="container">
        <div class="main_round_box"> 
            <div class="row">
                <div class="col-sm-5">
                    <div class="left_blue_box section_headline">
                        <h1>Sign Up for <b>FREE</b></h1>
                        <p>Enter your personal details<br>and start journy with us.</p>
                        <p><?= Yii::$app->session->getFlash('success') ?></p>
                        
                        <?php $form = ActiveForm::begin(); ?>

                        <?=
                        $form->field($model, 'first_name')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Full name'])->label(false)
                        ?>

                        <?=
                        $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Enter email', 'aria-describedby' => 'emailHelp'])->label(false)
                        ?>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                        <?=
                        $form->field($model, 'password_hash')->passwordInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Password'])->label(false)
                        ?>
                        
                        <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary prpl_btn']) ?>
                        
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="right_wt_box section_headline">
                        <h1>Try XYZ free<br>for 30 days </h1>
                        <p>We are the best online marketing platform that you can afford. Where you will get high converting landing pages within 1 click.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>