<?php
namespace common\tests\unit;

use common\models\Film;
use common\repositories\FilmRepository;
use common\tests\fixtures\FilmFixture;
use Codeception\Test\Unit;
use Yii;



class FilmRepositoryTest extends Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    /** @var FilmRepository */
    private $filmRepository;

    /**
     * @return array
     */
    public function _fixtures()
    {

        return ['films' => FilmFixture::className()];
    }

    public function _before(){
        $this->filmRepository = new FilmRepository(new Film());
    }


    /**
     *
     * @throws \yii\web\NotFoundHttpException
     */
    public function testGetById(){

        $film = $this->tester->grabFixture('films', 'film1');

        expect($this->filmRepository->getById($film->id)->id)->equals($film->id);
        expect($this->filmRepository->getById($film->id)->title)->equals($film->title);
        expect($this->filmRepository->getById($film->id)->year)->equals($film->year);
        expect($this->filmRepository->getById($film->id)->raiting)->equals($film->raiting);
        expect($this->filmRepository->getById($film->id)->raiting_mpaa)->equals($film->raiting_mpaa);
        expect($this->filmRepository->getById($film->id)->img_url)->equals($film->img_url);
    }
    public function testFindByIdSecond(){

        $film = $this->tester->grabFixture('films', 'film2');

        expect($this->filmRepository->getById($film->id)->id)->equals($film->id);
        expect($this->filmRepository->getById($film->id)->title)->equals($film->title);
        expect($this->filmRepository->getById($film->id)->year)->equals($film->year);
        expect($this->filmRepository->getById($film->id)->raiting)->equals($film->raiting);
        expect($this->filmRepository->getById($film->id)->raiting_mpaa)->equals($film->raiting_mpaa);
        expect($this->filmRepository->getById($film->id)->img_url)->equals($film->img_url);
    }


}