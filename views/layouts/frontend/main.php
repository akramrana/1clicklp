<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use app\assets\FrontendAsset;
use yii\widgets\ActiveForm;

FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php $this->registerCsrfMetaTags() ?>
        <title>1 Click LP::<?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script type="application/javascript">
            var baseUrl = '<?php echo yii\helpers\BaseUrl::home(); ?>';
            var _csrf = '<?php echo Yii::$app->request->getCsrfToken() ?>';
        </script>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?= BaseUrl::home(); ?>"><img src="<?= BaseUrl::home(); ?>ui/images/logo.png" alt="1 Click LP"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <?php
                    if (Yii::$app->session['_1clickLpCustomerLogin']) {
                        ?>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Create</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= Url::to(['site/category', 'id' => 1, 'title' => 'email']); ?>">Email</a>
                                <a class="dropdown-item" href="<?= Url::to(['site/category', 'id' => 2, 'title' => 'landing-page']); ?>">Landing page</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['site/campaign']); ?>">Campaigns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['site/audience']); ?>">Audience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['site/report']); ?>">Reports</a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= Url::to(['site/about']); ?>">About <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['site/features']); ?>">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['site/pricing']); ?>">Pricing</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <span class="navbar-text">
                    <?php
                    if (Yii::$app->session['_1clickLpCustomerLogin']) {
                        ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo Yii::$app->session['_1clickLpCustomerData']['first_name'] . ' ' . Yii::$app->session['_1clickLpCustomerData']['last_name']; ?></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= Url::to(['site/edit-profile']); ?>">Profile</a>
                                    <a class="dropdown-item" href="<?= Url::to(['site/my-account']); ?>">Account</a>
                                    <a class="dropdown-item" href="<?= Url::to(['site/pricing']); ?>">Change plan</a>
                                    <a class="dropdown-item" href="<?= Url::to(['site/notification']); ?>">Notifications</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= Url::to(['site/signout']); ?>">Log Out</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::to(['site/support']); ?>">Support</a>
                            </li>
                        </ul>
                        <?php
                    } else {
                        ?>
                        <a class="" href="<?= Url::to(['site/signin']); ?>">Sign in</a>
                        <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signup']); ?>">Register</a>
                        <?php
                    }
                    ?>
                </span>
            </div>
        </nav>
        <?= $content; ?>
        <section id="grey_footer" class="section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 btm_padding">
                        <a href="<?= Url::to(['/']); ?>">
                            <img src="<?= BaseUrl::home(); ?>ui/images/footer_logo.png" alt="1 Click LP">
                        </a>
                    </div>
                    <div class="col-sm-5 btm_padding">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signin']); ?>">Get started</a>
                    </div>
                    <div class="col-sm-4 footer_links btm_padding">
                        <h2>Quick Links</h2>
                        <ul>
                            <li><a href="<?= Url::to(['/']); ?>">Home</a></li>
                            <li><a href="<?= Url::to(['site/features']); ?>">Services</a></li>
                            <li><a href="<?= Url::to(['site/pricing']); ?>">Price</a></li>
                            <li><a href="<?= Url::to(['site/contact-us']); ?>">Contact</a></li>
                        </ul>
                        <?php
                        $form = ActiveForm::begin([
                                    'id' => 'subscribe-newsletter-form',
                                    'fieldConfig' => [
                                        'options' => [
                                            'tag' => 'span',
                                        ],
                                    ],
                                    'action' => Url::to(['site/subscribe-newsletter']),
                        ]);
                        $nsModel = new app\models\NewsletterSubscriber();
                        ?>
                        <div id="ns-response"></div>
                        <?=
                        $form->field($nsModel, 'email', [
                            'template' => '{input}',
                            'errorOptions' => [
                                'tag' => 'span',
                            ]
                        ])->textInput(['class' => "", 'placeholder' => 'Your email...'])->label(false);
                        ?>
                        <?= Html::submitButton('Subscribe', ['class' => 'btn btn-primary prpl_btn']) ?>
                        <?php
                        ActiveForm::end();
                        ?>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-12 legal_txt">
                        <hr>
                        <p>Copyright @<?php echo date('Y') ?>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $this->registerJs("$('body').on('beforeSubmit', 'form#subscribe-newsletter-form', function (e) {
                                var form = $(this);
                                if (form.find('.has-error').length) {
                                    return false;
                                }
                                else{
                                    $('#ns-response').html('<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-info\">" . Yii::t('app', 'Sending...') . "</div></div></div>');
                                    $.ajax({
                                         url: form.attr('action'),
                                         type: 'post',
                                         data: form.serialize(),
                                         success: function (response) {
                                            if(response.status==200){
                                                $('#subscribe-newsletter-form')[0].reset();
                                                $('#ns-response').html('<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-success\">" . Yii::t('app', 'Newsletter subcription successful!') . "</div></div></div>');
                                            }
                                            else{
                                               $('#ns-response').html('<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-danger\">" . Yii::t('app', 'There was error to saving your data!') . "</div></div></div>');
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
        ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>