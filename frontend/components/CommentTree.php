<?php
namespace frontend\components;

use common\models\Comment;
use common\models\Film;
use common\models\Staff;
use yii\base\Widget;
use yii\helpers\Html;


class CommentTree extends Widget
{
    public $model;

    public function run()
    {
        $childResult = "";

        $result = "";
        /** Comments $comment*/
        foreach ($this->model->comments as $comment) {
            if ($comment->parrent_id == null) //определяю родительский комментарий
            {
                $level = 1;
                $result .= $this->printComment($comment, $this->model, $level); //печатаю родительский коммент
                $result .= $this->tree($this->model, $comment->id, $level, $childResult);
            }
        }

        return $result;
    }

    /**
     * @param Film $model
     * @param $parentId
     * @param $level
     * @param $childResult
     * @return string
     */
    private function tree( $model,  $parentId,  $level,  $childResult) //рекурсивная функция
    {
        $level++;
        foreach ($model->comments as $childComment) {
            if ($parentId == $childComment->parrent_id) {
                $childResult .= $this->printComment($childComment, $model, $level);
                $childResult = $this->tree($model, $childComment->id, $level, $childResult);
            }
        }
        $level -=1;
        return $childResult;
    }

    /**
     * @param Comment $commentObj
     * @param $model
     * @param $n
     * @return string
     * @throws \yii\base\InvalidConfigException
     */

    private function printComment(Comment $commentObj, $model, $n)
    {
        $url='Joyks!!!!! Oops';
        if($commentObj->film_id)
            $url='film';
        if($commentObj->staff_id)
            $url='staff';

        $margin = 40 * $n;
        $printResult = "<li style=\"margin-left:{$margin}px\"/><b>" . Html::encode($commentObj->createdBy->username) . '</b>';
            $printResult .= "<i> " . Html::encode($commentObj->getTimeCreate()) . "</i> ";
        $printResult .= Html::a("Add comment",
                ["$url/filial-comment?id=" . $model->id . "&parrentId=" . $commentObj->id],
                ["class" => "btn btn-primary"]) . '<br><p class="commentText">' . Html::encode($commentObj->comment) . '</p><br><hr></li>';

        return $printResult;
    }

}