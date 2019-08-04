<?php
namespace common\repositories;

use common\models\Comment;
use yii\web\NotFoundHttpException;


class CommentRepository
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    private function findById($id)
    {
        return Comment::findOne($id);
    }

    /**
     * @param $id
     * @return Film
     * @throws NotFoundHttpException
     */
    public function getById($id) : Film
    {
        if (($model = $this->findById($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}