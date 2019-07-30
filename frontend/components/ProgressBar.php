<?php

namespace frontend\components;

use yii\base\Widget;

class ProgressBar extends Widget
{
    public $model;

    public function run()
    {
        $star = floor($this->model->raiting);
        $starPart = -floor((1 - ($this->model->raiting - $star)) * 48);
        $printStar = '';
        $printStar .= ' <div class="star">';
        for ($i = 0; $i < $star; $i++) {//Отрисовка целых звёзд
            $printStar .= "<img src='..\images\starfull.jpg'/>";
        }
        $printStar .= '</div>';
        if ($star < 5) {
            $printStar .= '<p class="crop"><a href="#" ><img src="..\images\starfull.jpg" style="margin:0px ';
            $printStar .= "$starPart";
            $printStar .= 'px 0px 0px" alt="css template" /></a></p>';
            }
            return $printStar;
        }


}
