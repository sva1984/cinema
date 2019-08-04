<?php

namespace frontend\controllers;

use common\repositories\StaffRepository;
use common\services\StaffServices;
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
    /** @var StaffRepository */
    private $staffRepository;

    /** @var StaffServices */
    private $staffServices;

    public function __construct
    (
        $id,
        $module,
        StaffRepository $staffRepository,
        StaffServices $staffServices,
        array $config = []
    ) {
        parent::__construct($id, $module, $config);
        $this->staffRepository = $staffRepository;
        $this->staffServices = $staffServices;
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
            $this->staffServices->createAndSaveByModelAndParam($commentModel, $id);
            Yii::$app->session->setFlash('success', 'comment added');
        }
        $commentModel = new Comment();
        return $this->render('view', [
            'model' => $this->staffRepository->getById($id),
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
        $filmModel = $this->staffRepository->getById($id);
        if ($filialComment->load(Yii::$app->request->post())) {
            $this->staffServices->createAndSaveByModelAndParam($filialComment, $id, $parrentId);
            return $this->redirect(Url::to(['staff/view', 'id' => $id]));
        }

        return $this->render('_formparrent', [
            'filialComment' => $filialComment,
            'parentId' => $parrentId,
            'model' => $filmModel,

        ]);
    }
}
