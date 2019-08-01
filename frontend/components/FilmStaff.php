<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class FilmStaff extends Widget
{
    public $model;
    public $professian;

    public function run()
    {
        $aFilmStaff = [];
        $strGenre = '';
        foreach ($this->model->staff as $woker) {
            if($woker->profession == $this->professian)
                $aFilmStaff[$woker->id] = $woker->name;

        }
        foreach ($aFilmStaff as $key => $value)
            $strGenre .= Html::a($value,"/staff/view?id=$key").', ';
        return $strGenre;
        }


}
