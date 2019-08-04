<?php
namespace common\repositories;


use common\models\Genre;
use yii\web\NotFoundHttpException;


class GenreRepository
{
    private $genre;

    public function __construct(Genre $genre)
    {
        $this->genre = $genre;
    }

    private function findById($id)
    {
        return Genre::findOne($id);
    }

    /**
     * @param $id
     * @return Film
     * @throws NotFoundHttpException
     */
    public function getById($id) : Genre
    {
        if (($model = $this->findById($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}