<?php
namespace common\tests\unit\models;

use common\repositories\FilmRepository;
use Yii;
use common\models\LoginForm;
use common\fixtures\UserFixture;


class FilmRepositoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    /** @var FilmRepository */
    private $filmRepository;

    public function __construct(
        string $name = null, array $data = [], string $dataName = '',
        FilmRepository $filmRepository
    ) {
        parent::__construct($name, $data, $dataName);
        $this->filmRepository = $filmRepository;
    }

    /**
     * @return array
     */
    public function _fixtures()
    {
        // Свою фикстура для своей модели
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }

    /**
     * @throws \yii\web\NotFoundHttpException
     */
    public function testGetById(){
        $id = 2;


        $model = $this->filmRepository->getById($id);


        expect('model find', $model->id)->equals($id);

    }

}