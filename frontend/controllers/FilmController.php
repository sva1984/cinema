<?php

namespace frontend\controllers;

use common\models\Comment;

use common\repositories\FilmRepository;
use common\services\FilmServices;
use Yii;
use common\models\Film;
use common\models\FilmSearch;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//use frontend\service\FilmControlService;

/**
 * FilmController implements the CRUD actions for Film model.
 */
class FilmController extends Controller
{
    /** @var StaffRepository */
    private $filmRepository;

    /** @var FilmServices */
    private $filmServices;

    public function __construct
    (
        $id, $module,
        FilmRepository $filmRepository,
        FilmServices $filmServices,
        array $config = []
    ) {
        parent::__construct($id, $module, $config);
        $this->filmRepository = $filmRepository;
        $this->filmServices = $filmServices;
    }

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
        if ($commentModel->load(Yii::$app->request->post()))
        {
            $this->filmServices->createAndSaveByModelAndParam($commentModel, $id);
            Yii::$app->session->setFlash('success', 'comment added');
        }
        $commentModel = new Comment();

        return $this->render('view', [
            'model' => $this->filmRepository->getById($id),
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
        if ($filialComment->load(Yii::$app->request->post()))
        {
            $this->filmServices->createAndSaveByModelAndParam($filialComment, $id, $parrentId);
            Yii::$app->session->setFlash('success', 'comment added');
            return $this->redirect(Url::to(['film/view', 'id' => $id]));
        }

        return $this->render('_formparrent', [
            'filialComment' => $filialComment,
            'parentId' => $parrentId,
            'model' => $this->filmRepository->getById($id),
        ]);
    }
}
