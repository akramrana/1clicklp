<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\components\UserIdentity;
use app\components\AccessRule;
use yii\filters\VerbFilter;

class ProfileController extends \yii\web\Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['edit'],
                'rules' => [
                    [
                        'actions' => ['edit'],
                        'allow' => true,
                        'roles' => [
                            UserIdentity::ROLE_ADMIN
                        ]
                    ],
                ],
            ],
        ];
    }

    public function actionEdit() {
        $model = \app\models\Admins::find()
                ->where(['admin_id' => Yii::$app->user->identity->admin_id, 'is_active' => 1, 'is_deleted' => 0])
                ->one();
        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->bodyParams;
            if (!empty($request['Admins']['confirm_password'])) {
                $password = $request['Admins']['confirm_password'];
                $model->password = Yii::$app->security->generatePasswordHash($password);
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Profile successfully updated');
                return $this->redirect(['edit']);
            } else {
                return $this->render('edit', [
                            'model' => $model
                ]);
            }
        }
        return $this->render('edit', [
                    'model' => $model
        ]);
    }

}
