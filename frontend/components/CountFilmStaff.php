<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\FilmStaff;
use common\models\Film;

class CountFilmStaff extends Widget
{
    public $model;

    public function run()
    {
        $countFilms = FilmStaff::find()->where(['staff_id' => $this->model->id])->count();//MTM все фильмы и жанры
            return $countFilms;
        }


}
