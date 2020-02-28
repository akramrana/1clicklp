<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\Pagination;

define('MAX_FILE_LIMIT', 1024 * 1024 * 2);

class SiteController extends Controller
{

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

    public function actionEditor($id) {
        $this->layout = 'frontend\main';
        return $this->renderAjax('editor-v2', [
                    'id' => $id
        ]);
        //return $this->renderAjax('editor');
    }

    function sanitizeFileName($fileName) {
        //sanitize, remove double dot .. and remove get parameters if any
        $fileName = __DIR__ . '/' . preg_replace('@\?.*$@', '', preg_replace('@\.{2,}@', '', preg_replace('@[^\/\\a-zA-Z0-9\-\._]@', '', $fileName)));
        return $fileName;
    }

    public function actionSaveTemplate() {
        if (Yii::$app->request->post()) {
            $request = Yii::$app->request->bodyParams;
            $template = \app\models\Templates::find()
                    ->where(['is_deleted' => 0, 'is_active' => 1, 'template_id' => $request['template_id']])
                    ->one();
            if (!empty($template)) {
                $model = \app\models\ClientTemplates::find()
                        ->where(['client_id' => Yii::$app->session['_1clickLpCustomerData']['client_id']])
                        ->andWhere(['template_id' => $template->template_id, 'is_deleted' => 0])
                        ->one();
                if (empty($model)) {
                    $model = new \app\models\ClientTemplates();
                    $model->client_id = Yii::$app->session['_1clickLpCustomerData']['client_id'];
                    $model->created_at = date('Y-m-d H:i:s');
                }
                $model->updated_at = date('Y-m-d H:i:s');
                $html = \yii\helpers\Html::encode($request['html']);
                $model->raw_html_content = $html;
                $model->name_en = $template->title_en;
                $model->page_title_en = $template->sub_title_en;
                $model->template_id = $template->template_id;
                if ($model->save()) {
                    return 'File saved successfully';
                } else {
                    return 'Error saving file ' . json_encode($model->errors);
                }
            }else{
                return 'There was error processing your request.Please try again.';
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

    public function actionViewTemplate($id) {
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
        if (Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/my-account']);
        }
        $this->layout = 'frontend\main';
        $model = new \app\models\UserLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/my-account']);
        }

        $model->password = '';
        return $this->render('signin', [
                    'model' => $model,
        ]);
    }

    public function actionSignup() {
        if (Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/my-account']);
        }
        $this->layout = 'frontend\main';
        $model = new \app\models\Clients();
        $model->scenario = 'signup';
        $model->created_at = date('Y-m-d H:i:s');
        $model->updated_at = date('Y-m-d H:i:s');
        $model->type = 'F';
        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->bodyParams;
            $password = $request['Clients']['password_hash'];
            $model->password = Yii::$app->security->generatePasswordHash($password);
            $model->is_active = 1;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Registration successfully completed');
                return $this->redirect(['site/signup']);
            } else {
                return $this->render('signup', [
                            'model' => $model,
                ]);
            }
        }
        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionContactUs() {
        $this->layout = 'frontend\main';
        return $this->render('contact-us');
    }

    public function actionChangePassword() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('change-password');
    }

    public function actionForgotPassword() {
        if (Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('forgot-password');
    }

    public function actionMyAccount() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('my-account');
    }

    public function actionEditProfile() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        $model = \app\models\Clients::findOne(Yii::$app->session['_1clickLpCustomerData']['client_id']);
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->load(Yii::$app->request->post())) {
                $request = Yii::$app->request->bodyParams;
                if ($model->save()) {
                    return[
                        'status' => 200,
                    ];
                } else {
                    return[
                        'status' => 500,
                        'msg' => 'E-mail/Phone already been taken!'
                    ];
                }
            }
        }
        $passwordForm = new \app\models\PasswordForm();
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($passwordForm->load(\Yii::$app->request->post())) {
                if ($passwordForm->validate()) {
                    if (isset($passwordForm->repeatNewPass) && $passwordForm->repeatNewPass != "") {
                        $model->password = Yii::$app->security->generatePasswordHash($passwordForm->repeatNewPass);
                    }
                    if ($model->save()) {
                        return[
                            'status' => 200,
                            'msg' => ''
                        ];
                    } else {
                        return[
                            'status' => 500,
                            'msg' => $model->errors,
                        ];
                    }
                } else {
                    return[
                        'status' => 500,
                        'msg' => $passwordForm->errors['oldPass'][0],
                    ];
                }
            }
        }
        return $this->render('edit-profile', [
                    'model' => $model,
                    'passwordForm' => $passwordForm,
        ]);
    }

    public function actionSignout() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        \Yii::$app->session->remove('_1clickLpCustomerLogin');
        \Yii::$app->session->remove('_1clickLpCustomerAuth');
        \Yii::$app->session->remove('_1clickLpCustomerData');
        //
        return $this->redirect(['site/signin']);
    }

    public function actionSaveFeedback() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $model = new \app\models\Feedback();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return [
                    'status' => 200
                ];
            }
        }
    }

    public function actionBilling() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('billing');
    }

    public function actionApi() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('api');
    }

    public function actionSubscribeNewsletter() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $model = new \app\models\NewsletterSubscriber();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return [
                    'status' => 200
                ];
            }
        }
    }

    public function actionUpdateProfilePic() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $model = \app\models\Clients::find()
                    ->where(['client_id' => Yii::$app->session['_1clickLpCustomerData']['client_id'], 'is_deleted' => 0])
                    ->one();
            if (!empty($model)) {
                $request = Yii::$app->request->bodyParams;
                //debugPrint($request);exit;
                $imageStr = str_replace('data:image/png;base64,', '', $request['image']);
                $imageStr = str_replace('data:image/jpeg;base64,', '', $imageStr);
                $imageStr = str_replace('data:image/gif;base64,', '', $imageStr);
                $image = base64_decode($imageStr);
                if ($image) {
                    try {
                        $img = imagecreatefromstring($image);
                        if ($img !== false) {
                            $imageName = time() . '.png';
                            imagepng($img, Yii::$app->basePath . '/web/uploads/' . $imageName, 9);
                            imagedestroy($img);
                            $model->photo = $imageName;
                            if ($model->save()) {
                                $user = \app\models\ClientUser::findByUsername(Yii::$app->session['_1clickLpCustomerData']['email']);
                                \Yii::$app->session->set('_1clickLpCustomerData', $user);
                                return [
                                    'status' => 200,
                                    'path' => \yii\helpers\BaseUrl::home() . '/uploads/' . $model->photo,
                                    'msg' => ''
                                ];
                            }
                        } else {
                            return [
                                'status' => 500,
                                'path' => "",
                                'msg' => 'Error Uploading File'
                            ];
                        }
                    } catch (\Exception $e) {
                        return [
                            'status' => 500,
                            'path' => "",
                            'msg' => 'Error Uploading File',
                        ];
                    }
                }
            }
        }
    }

    public function actionAudience() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('audience');
    }

    public function actionCampaign() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('campaign');
    }

    public function actionReport() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('report');
    }

    public function actionCategory($id, $title = "") {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        $query = \app\models\Templates::find()
                ->where(['category_id' => $id, 'is_deleted' => 0, 'is_active' => 1])
                ->orderBy(['template_id' => SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 12,
        ]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        $category = \app\models\Categories::findOne($id);
        return $this->render('category', [
                    'models' => $models,
                    'pages' => $pages,
                    'category' => $category,
        ]);
    }

    public function actionGetTemplate($id) {
        $clientTemplate = \app\models\ClientTemplates::find()
                ->where(['client_id' => Yii::$app->session['_1clickLpCustomerData']['client_id']])
                ->andWhere(['template_id' => $id, 'is_deleted' => 0])
                ->one();
        if (empty($clientTemplate)) {
            $model = \app\models\Templates::find()
                    ->where(['template_id' => $id, 'is_deleted' => 0, 'is_active' => 1])
                    ->one();
            $raw_html_content = \yii\helpers\Html::decode($model->raw_html_content);
        } else {
            $raw_html_content = \yii\helpers\Html::decode($clientTemplate->raw_html_content);
        }

        return $raw_html_content;
    }

    public function actionNotification() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('notification');
    }

    public function actionSupport() {
        if (!Yii::$app->session['_1clickLpCustomerLogin']) {
            return $this->redirect(['site/signin']);
        }
        $this->layout = 'frontend\main';
        return $this->render('support');
    }

}
