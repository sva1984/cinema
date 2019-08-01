<?php

namespace frontend\controllers;

use Yii;
use common\models\Staff;
use common\models\StaffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Comment;
use yii\helpers\Url;

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {

        $commentModel = new Comment();
        if ($commentModel->load(Yii::$app->request->post())) {
            $commentModel->staff_id = $id;
            if (!$commentModel->save())
            {
                die(print_r($commentModel->errors));
            }
            Yii::$app->session->setFlash('success', 'comment added');
        }
        $commentModel = new Comment();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'commentModel' => $commentModel,
        ]);
    }

    /**
     * @param $id
     * @param $parrentId
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionFilialComment($id, $parrentId)
    {


        $filialComment = new Comment();
        $filmModel = $this->findModel($id);
        if ($filialComment->load(Yii::$app->request->post())) {


            $filialComment->staff_id = $id;
            $filialComment->parrent_id = $parrentId;
            Yii::$app->session->setFlash('success', 'comment added');
            if (!$filialComment->save()) {
                die(print_r($filialComment->errors));
            }

            return $this->redirect(Url::to(['staff/view', 'id' => $id]));

        }

        return $this->render('_formparrent', [
            'filialComment' => $filialComment,
            'parentId' => $parrentId,
            'model' => $filmModel,

        ]);
    }


    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Staff();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Staff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
