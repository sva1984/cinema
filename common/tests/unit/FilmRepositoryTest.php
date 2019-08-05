<?php
namespace common\tests\unit;

use common\repositories\FilmRepository;
use common\tests\fixtures\FilmFixture;
use Codeception\Test\Unit;
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

//    public function __construct(
//        string $name = null, array $data = [], string $dataName = null,
//        FilmRepository $filmRepository
//    ) {
//        parent::__construct($name, $data, $dataName);
//        $this->filmRepository = $filmRepository;
//    }

    public function __construct(
        $id, $module,
        FilmRepository $filmRepository,
                array $config = []
    ) {
        parent::__construct($id, $module, $config);
        $this->filmRepository = $filmRepository;

    }


    /**
     * @return array
     */
    public function _fixtures()
    {

        return ['films' => FilmFixture::className()];
    }
    /**
     * @throws \yii\web\NotFoundHttpException
     */
    public function testGetById(){
//        sleep(15);
//        $id = 1;
//        $model = $this->filmRepository->grabFixture('films', 'film1');
//        $model1 = new FilmRepository();
//        echo '<pre>'. print_r($model1->filmRepository->getById($id)) . '</pre>';
//        die();
//        expect('model find', $model->filmRepository->getById($id)->id)->equals($id);

    }

    public function testGetById2(){
//        sleep(15);
        $id = 1;
        $film = $this->tester->grabFixture('films', 'film1');
        $this->filmRepository = new FilmRepository();
        expect($this->filmRepository->getById($id)->id)->equals($film->id);

    }

}