<?php

namespace app\controllers;

use Yii;
use app\models\ClientTemplates;
use app\models\ClientTemplateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientTemplateController implements the CRUD actions for ClientTemplates model.
 */
class ClientTemplateController extends Controller
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
        ];
    }

    /**
     * Lists all ClientTemplates models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ClientTemplateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClientTemplates model.
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
     * Creates a new ClientTemplates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ClientTemplates();
        $model->created_at = date('Y-m-d H:i:s');
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post())) {
            $template = \app\models\Templates::findOne($model->template_id);
            $model->raw_html_content = $template->raw_html_content;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Client template successfully added');
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
     * Updates an existing ClientTemplates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Client template successfully updated');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ClientTemplates model.
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
            Yii::$app->session->setFlash('success', 'Client template successfully deleted');
            return $this->redirect(['index']);
        }
    }

    public function actionActivate($id) {
        $model = $this->findModel($id);
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
        if ($model->is_published == 0) {
            $model->is_published = 1;
            if($model->publish_url==null){
                $title = clean($model->name_en);
                $model->publish_url = Yii::$app->urlManager->createAbsoluteUrl('t/'.$model->client_id.'/'.$title);
            }
        } else {
            $model->is_published = 0;
        }
        if ($model->validate() && $model->save()) {
            return '1';
        } else {
            return json_encode($model->errors);
        }
    }

    /**
     * Finds the ClientTemplates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClientTemplates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ClientTemplates::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
