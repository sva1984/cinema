<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class StaffFilm extends Widget
{
    public $model;

    public function run()
    {
        $linkFilm='';

            foreach($this->model->films as $film)
            {
                $linkFilm .= Html::a(
                        $film->title,
                        "/film/view?id=$film->id").', ';
            };
        return $linkFilm;
        }


}
