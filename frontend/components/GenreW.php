<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class GenreW extends Widget
{
    public $model;

    public function run()
    {
        $strGenre='';

            foreach($this->model->genres as $genre)
            {
                $strGenre .= Html::a(
                        $genre->genre,
                        "/genre/view?id=$genre->id").', ';
            };
            return $strGenre;
        }


}
