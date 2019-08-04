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
        $oneFilmGenres=[];
        $tmp=[];
        $result = '';
        foreach ($this->model->genres as $genre)
            $oneFilmGenresUpdate = array_shift($oneFilmGenres);
        {
            $oneFilmGenres[]=$genre->id;
        }
        $allGenres = FilmGenre::find()->where(['genre_id' => $oneFilmGenres])->all();//MTM все фильмы и жанры
        foreach ($allGenres as $genre)
            $tmp[]=$genre['film_id'];



        foreach ($tmp as $t)
            if($t != $this->model->id)
            $result .= "<a href='view?id=".$t."'><img src='". Film::findOne($t)->img_url . "' width='150' 
   height='150' margin-right='10'></a>";

            return $result;
        }


}
