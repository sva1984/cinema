<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class StaffGenre extends Widget
{
    public $model;

    public function run()
    {
        $filmGanres = [];
        $strGenre = '';
        foreach ($this->model->films as $film) {
            foreach ($film->genres as $genre) {
                $filmGanres[$genre->id] = $genre->genre;
            }
        }
        foreach ($filmGanres as $key => $value)
            $strGenre .= Html::a($value,"/genre/view?id=$key").', ';
        return $strGenre;
        }


}
