<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Contact Us';
?>
<section id="contact_hero">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 section_headline section_copy">
                    <h1>Get In Touch</h1>
                    <p>Leave your important feedback to us, one of our team members will get back to you soon.</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-6">
                    <img src="<?= BaseUrl::home(); ?>ui/images/world-map.png" alt="world map" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact_page_form" class="section_padding margin_btm_50">
    <div class="container">
        <div class="row form_box">
            <div class="col-lg-3 col-sm-4 left_items">
                <a href="mailto:">
                    <img src="<?= BaseUrl::home(); ?>ui/images/contact_email.png" alt="email">
                </a>
                <h2>Please describe <br/>your queries</h2>
                <p>
                    We need your email <br/>
                    addres to reach <br/>
                    you back
                </p>
            </div>
            <div class="col-lg-9 col-sm-8 right_items">
                <h2>Send us a Message</h2>
                <?php
                $form = ActiveForm::begin([
                            'id' => 'feedback-form',
                            'action' => Url::to(['site/save-feedback']),
                ]);
                $feedBackModel = new app\models\Feedback();
                ?>
                <div id="feedback-response"></div>
                <?=
                $form->field($feedBackModel, 'message')->textarea(['rows' => true]);
                ?>
                <div class="form-row">
                    <div class="col">
                        <?=
                        $form->field($feedBackModel, 'name')->textInput(['maxlength' => true, 'class' => 'form-control']);
                        ?>
                    </div>
                    <div class="col">
                        <?=
                        $form->field($feedBackModel, 'email')->textInput(['maxlength' => true, 'class' => 'form-control']);
                        ?>
                    </div>
                </div>
                <?= Html::submitButton('SEND', ['class' => 'btn btn-primary']) ?>
                <?php
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</section>
<?php
$this->registerJs("$('body').on('beforeSubmit', 'form#feedback-form', function (e) {
    var form = $(this);
    if (form.find('.has-error').length) {
        return false;
    }
    else{
        $('#feedback-response').html('<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-info\">" . Yii::t('app', 'Sending...') . "</div></div></div>');
        $.ajax({
             url: form.attr('action'),
             type: 'post',
             data: form.serialize(),
             success: function (response) {
                if(response.status==200){
                    $('#feedback-form')[0].reset();
                    $('#feedback-response').html('<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-success\">" . Yii::t('app', 'Feedback successfully saved!') . "</div></div></div>');
                }
                else{
                   $('#feedback-response').html('<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-danger\">" . Yii::t('app', 'There was error to saving your feedback!') . "</div></div></div>');
                }
             },
             error: function (jqXHR, textStatus, errorThrown)
            {
                alert(jqXHR.responseText);
            }
         });
         return false;            
    }
});", \yii\web\View::POS_END);