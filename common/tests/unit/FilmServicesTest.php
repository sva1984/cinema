<?php
namespace common\tests\unit;

use common\models\Film;
use common\services\FilmServices;
use common\tests\fixtures\CommentFixture;
use http\Exception\InvalidArgumentException;
use Codeception\Test\Unit;
use Yii;



class FilmServicesTest extends Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    /** @var FilmServices */
    private $filmServices;

    /**
     * @return array
     */
    public function _fixtures()
    {

        return ['comments' => CommentFixture::className()];
    }

    public function _before(){
        $this->filmServices = new FilmServices();
    }


    /**
     *
     * @throws \yii\web\NotFoundHttpException
     */
    public function testCreateAndSaveByModelAndParam(){

        $comment = $this->tester->grabFixture('comments', 'comment1');

        expect($this->filmServices->createAndSaveByModelAndParam($comment, $comment->id, $comment->parrent_id)->id)->equals($comment->id);
        expect($this->filmServices->createAndSaveByModelAndParam($comment, $comment->id, $comment->parrent_id)->comment)->equals($comment->comment);
        expect($this->filmServices->createAndSaveByModelAndParam($comment, $comment->id, $comment->parrent_id)->film_id)->equals($comment->film_id);
        expect($this->filmServices->createAndSaveByModelAndParam($comment, $comment->id, $comment->parrent_id)->created_by)->equals($comment->created_by);
        expect($this->filmServices->createAndSaveByModelAndParam($comment, $comment->id, $comment->parrent_id)->created_at)->equals($comment->created_at);
        expect($this->filmServices->createAndSaveByModelAndParam($comment, $comment->id, $comment->parrent_id)->parrent_id)->equals($comment->parrent_id);
    }
//


}