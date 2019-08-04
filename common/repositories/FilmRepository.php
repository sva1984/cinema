<?php
namespace common\repositories;

use common\models\Film;
use yii\web\NotFoundHttpException;


class FilmRepository
{
    private $film;

    public function __construct(Film $film)
    {
        $this->film = $film;
    }

    private function findById($id)
    {
        return Film::findOne($id);
    }

    /**
     * @param $id
     * @return Film
     * @throws NotFoundHttpException
     */
    public function getById($id) : Film
    {
        if (($model = $this->findById($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}