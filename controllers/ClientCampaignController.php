<?php

namespace app\controllers;

use Yii;
use app\models\ClientCampaigns;
use app\models\ClientCampaignSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\UserIdentity;
use app\components\AccessRule;
/**
 * ClientCampaignController implements the CRUD actions for ClientCampaigns model.
 */
class ClientCampaignController extends Controller
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
                'only' => ['index', 'view', 'create', 'update', 'delete', 'activate', 'publish'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'activate', 'publish'],
                        'allow' => true,
                        'roles' => [
                            UserIdentity::ROLE_ADMIN
                        ]
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all ClientCampaigns models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ClientCampaignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClientCampaigns model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ClientCampaigns model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ClientCampaigns();
        $model->created_at = date('Y-m-d H:i:s');
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $subscribers = \app\models\ClientSubscribers::find()
                        ->where(['client_id' => $model->client_id, 'is_active' => 1, 'is_deleted' => 0])
                        ->all();
                if (!empty($subscribers)) {
                    foreach ($subscribers as $sub) {
                        $campaignUser = new \app\models\ClientCampaignUsers();
                        $campaignUser->client_campaign_id = $model->client_campaign_id;
                        $campaignUser->client_subscriber_id = $sub->client_subscriber_id;
                        $campaignUser->save();
                    }
                }
                Yii::$app->session->setFlash('success', 'Campaign successfully added');
                return $this->redirect(['index']);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing ClientCampaigns model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Campaign successfully updated');
                return $this->redirect(['index']);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionActivate($id) {
        $model = $this->findModel($id);
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->is_active == 0) {
            $model->is_active = 1;
        } else {
            $model->is_active = 0;
        }
        if ($model->validate() && $model->save()) {
            return '1';
        } else {
            return json_encode($model->errors);
        }
    }

    public function actionPublish($id) {
        $model = $this->findModel($id);
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->is_publish == 0) {
            $model->is_publish = 1;
        } else {
            $model->is_publish = 0;
        }
        if ($model->validate() && $model->save()) {
            return '1';
        } else {
            return json_encode($model->errors);
        }
    }

    /**
     * Deletes an existing ClientCampaigns model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->updated_at = date('Y-m-d H:i:s');
        $model->is_deleted = 1;
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Campaign successfully deleted');
            return $this->redirect(['index']);
        }
    }

    public function actionGetTypesTemplates($id) {
        $models = \app\models\ClientTemplates::find()
                ->where(['client_id' => $id, 'is_deleted' => 0])
                ->all();
        $templates = [];
        $types = [];
        if (!empty($models)) {
            foreach ($models as $row) {
                $d = [
                    'id' => $row->client_template_id,
                    'name' => $row->name_en,
                ];
                $templates[] = $d;
            }
        }
        $campaigntypes = \app\models\ClientCampaignTypes::find()
                ->where(['client_id' => $id, 'is_deleted' => 0])
                ->all();
        if (!empty($campaigntypes)) {
            foreach ($campaigntypes as $row) {
                $d = [
                    'id' => $row->client_campaign_type_id,
                    'name' => $row->name_en,
                ];
                $types[] = $d;
            }
        }

        return json_encode([
            'templates' => $templates,
            'types' => $types,
        ]);
    }

    /**
     * Finds the ClientCampaigns model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClientCampaigns the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ClientCampaigns::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
