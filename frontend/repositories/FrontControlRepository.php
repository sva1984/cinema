<?php

namespace frontend\repositories;

use common\models\Film;


class FilmConrolRepository
{
    protected $filmConrolModel;

    public function __construct(Film $filmConrolModel)
    {
        $this->filmConrolModel = $filmConrolModel;
    }

}