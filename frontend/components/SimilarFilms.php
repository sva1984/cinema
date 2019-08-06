<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\FilmGenre;
use common\models\Film;

class SimilarFilms extends Widget
{
    public $model;

    public function run()
    {
        $result = '';

        foreach ($this->model->genres as $genre)
        {
            $oneFilmGenres[] = $genre->id;
        }

        $allGenres = FilmGenre::find()->where(['genre_id' => $oneFilmGenres])->all();
        foreach ($allGenres as $genre)
        {
            $arrayGenres []= $genre['film_id'];
        }

        $arrayGenres = array_unique($arrayGenres);
        foreach ($arrayGenres as $key => $value) {
            if ( $value != $this->model->id) {
                $result .= "<a href='view?id=" . $value . "'><img src='" . Film::findOne($value)->img_url . "' width='150' 
   height='150' margin-right='10'></a>";
            }
        }
        return $result;
    }


}
