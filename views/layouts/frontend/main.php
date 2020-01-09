<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use app\assets\FrontendAsset;
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
            <a class="navbar-brand" href="<?=BaseUrl::home();?>"><img src="<?=BaseUrl::home();?>ui/images/logo.png" alt="1 Click LP"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= Url::to(['site/about']);?>">About <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['site/features']);?>">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['site/pricing']);?>">Pricing</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="" href="<?= Url::to(['site/signin']);?>">Sign in</a>
                    <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signup']);?>">Register</a>
                </span>
            </div>
        </nav>
        <?=$content;?>
        <section id="grey_footer" class="section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 btm_padding">
                        <a href="<?= Url::to(['/']);?>">
                            <img src="<?=BaseUrl::home();?>ui/images/footer_logo.png" alt="1 Click LP">
                        </a>
                    </div>
                    <div class="col-sm-5 btm_padding">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signin']);?>">Get started</a>
                    </div>
                    <div class="col-sm-4 footer_links btm_padding">
                        <h2>Quick Links</h2>
                        <ul>
                            <li><a href="<?= Url::to(['/']);?>">Home</a></li>
                            <li><a href="<?= Url::to(['site/features']);?>">Services</a></li>
                            <li><a href="<?= Url::to(['site/pricing']);?>">Price</a></li>
                            <li><a href="<?= Url::to(['site/contact-us']);?>">Contact</a></li>
                        </ul>
                        <form action="#" method="Post">
                            <input type="text" name="text" placeholder="Your email..."><button type="button" class="btn btn-primary prpl_btn">Subscribe</button>
                        </form>
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
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>