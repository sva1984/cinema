<?php

namespace common\services;

use common\models\Comment;
use common\models\Film;
use http\Exception\InvalidArgumentException;
use yii\web\NotFoundHttpException;

class FilmServices
{


    /**
     * @param Comment $filialComment
     * @param int $id
     * @param int $parentId
     * @return Comment
     * @throws NotFoundHttpException
     */
    public function createAndSaveByModelAndParam(Comment $filialComment, int $id, int $parentId=null): Comment
    {
        $filialComment->film_id = $id;
        $filialComment->parrent_id = $parentId;

        if (!$filialComment->save()) {
            throw new InvalidArgumentException($filialComment->errors);
        }
        return $filialComment;
    }

}