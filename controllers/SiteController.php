<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

define('MAX_FILE_LIMIT', 1024 * 1024 * 2);

class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $this->layout = 'frontend\main';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->renderAjax('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        $this->layout = 'frontend\main';
        return $this->render('about');
    }

    public function actionEditor() {
        return $this->renderAjax('editor-v2');
        //return $this->renderAjax('editor');
    }

    function sanitizeFileName($fileName) {
        //sanitize, remove double dot .. and remove get parameters if any
        $fileName = __DIR__ . '/' . preg_replace('@\?.*$@', '', preg_replace('@\.{2,}@', '', preg_replace('@[^\/\\a-zA-Z0-9\-\._]@', '', $fileName)));
        return $fileName;
    }

    public function actionSaveTemplate() {
        $model = new \app\models\TestTemplate();
        if (Yii::$app->request->post()) {
            $request = Yii::$app->request->bodyParams;
            //debugPrint($request);exit;
            $html = \yii\helpers\Html::encode($request['html']);
            $model->html = $html;
            if ($model->save()) {
                return 'File saved successfully';
            } else {
                return 'Error saving file ' . $model->errors;
            }
        }
    }

    public function actionUploadImg() {
        $imageFile = \yii\web\UploadedFile::getInstanceByName('file');
        $directory = \Yii::getAlias('@app/web/uploads') . DIRECTORY_SEPARATOR;
        if ($imageFile) {
            //debugPrint($imageFile);exit;
            $filetype = mime_content_type($imageFile->tempName);
            $actulaName = $imageFile->name;
            $allowed = array('image/png', 'image/jpeg', 'image/gif');
            if (!in_array(strtolower($filetype), $allowed)) {
                return json_encode(['files' => [
                        'error' => "File type not supported",
                    ]
                ]);
            } else {
                $uid = uniqid(time(), true);
                $fileName = $uid . '.' . $imageFile->extension;
                $filePath = $directory . $fileName;
                if ($imageFile->saveAs($filePath)) {
                    $path = \yii\helpers\BaseUrl::home() . 'uploads/' . $fileName;

                    return $path;
                    /* return json_encode([
                      'files' => [
                      'name' => $fileName,
                      'size' => $imageFile->size,
                      "url" => $path,
                      "thumbnailUrl" => $path,
                      "deleteUrl" => 'image-delete?name=' . $fileName,
                      "deleteType" => "POST",
                      'error' => ""
                      ]
                      ]); */
                }
            }
        }
        return '';
    }

    public function actionViewTemplate($id)
    {
        $model = \app\models\TestTemplate::findOne($id);
        $html = \yii\helpers\Html::decode($model->html);
        
        return $html;
    }
    
    public function actionFeatures() {
        $this->layout = 'frontend\main';
        return $this->render('features');
    }
    
    public function actionPricing() {
        $this->layout = 'frontend\main';
        return $this->render('pricing');
    }
    
    public function actionSignin() {
        $this->layout = 'frontend\main';
        return $this->render('signin');
    }
    
    public function actionSignup() {
        $this->layout = 'frontend\main';
        return $this->render('signup');
    }
    
    public function actionContactUs() {
        $this->layout = 'frontend\main';
        return $this->render('contact-us');
    }
    
    public function actionChangePassword(){
        $this->layout = 'frontend\main';
        return $this->render('change-password');
    }
    
    public function actionForgotPassword(){
        $this->layout = 'frontend\main';
        return $this->render('forgot-password');
    }
    
    public function actionMyAccount(){
        $this->layout = 'frontend\main';
        return $this->render('my-account');
    }
    
    
    public function actionEditProfile(){
        $this->layout = 'frontend\main';
        return $this->render('edit-profile');
    }
}
