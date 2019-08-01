<?php

namespace frontend\controllers;

use common\models\Comment;
use common\models\User;
use common\services\ArticalsService;
use common\services\CommentService;
use common\services\UserService;
use frontend\services\FilmConrolService;
use Yii;
use common\models\Film;
use common\models\FilmSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\service\FilmControlService;

/**
 * FilmController implements the CRUD actions for Film model.
 */
class FilmController extends Controller
{

//    protected $filmContlolService;
//
//    public function __construct($id, $module,
//                               FilmConrolService $filmContlolService, $config = [])
//    {
//        parent::__construct($id, $module, $config);
//        $this->filmContlolService = $filmContlolService;
//    }




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
     * Lists all Film models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Film model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $commentModel = new Comment();
//        $userModel = new User();
        if ($commentModel->load(Yii::$app->request->post())) {
            $commentModel->film_id = $id;
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
//            'userModel' => $userModel

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


            $filialComment->film_id = $id;
            $filialComment->parrent_id = $parrentId;
            Yii::$app->session->setFlash('success', 'comment added');
                if (!$filialComment->save()) {
                die(print_r($filialComment->errors));
            }

            return $this->redirect(Url::to(['film/view', 'id' => $id]));

        }

        return $this->render('_formparrent', [
            'filialComment' => $filialComment,
            'parentId' => $parrentId,
            'model' => $filmModel,

        ]);
    }

    /**
     * Creates a new Film model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Film();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Film model.
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
     * Deletes an existing Film model.
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
     * Finds the Film model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Film the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Film::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
