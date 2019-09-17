<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;
use app\assets\ThemeAsset;

AppAsset::register($this);
ThemeAsset::register($this);
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition login-page">
        <?php $this->beginBody() ?>
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>1Click</b>LP</a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>


                <?php
                $form = ActiveForm::begin([
                            'id' => 'login-form',
                ]);
                ?>

                <?=
                $form->field($model, 'username', [
                    'template' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>{error}',
                    'options' => [
                        'class' => 'form-group has-feedback'
                    ]
                ])->textInput(['autofocus' => true, 'placeholder' => 'Email'])
                ?>

                <?=
                $form->field($model, 'password', [
                    'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}',
                    'options' => [
                        'class' => 'form-group has-feedback'
                    ]
                ])->passwordInput(['placeholder' => 'Password'])
                ?>


                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <?=
                            $form->field($model, 'rememberMe')->checkbox([
                                'inputTemplate' => '{label}{input}',
                            ])
                            ?>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                    </div>

                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>