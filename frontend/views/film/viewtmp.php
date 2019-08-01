<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Comment;
use common\models\Film;
use frontend\assets\AppAsset;
use frontend\assets\Cinema;
use frontend\components\ProgressBar;
use frontend\components\GenreW;

AppAsset::register($this);
Cinema::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Film */
/* @var $commentModel common\models\Comment */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>



<div class="container">
    <div class="row">
        <div class="film-promo">
            <!--            Показываем картинку       -->
            <p><img src="<?= $model->img_url ?>" alt="<?= $model->title ?>"></p>
            <!--            Показываем видео          -->
            <iframe width="125%" height="160%" src="<?= $model->video_url ?>" frameborder="2"
                    allowfullscreen></iframe>
        </div>
        <div class="film-view">


            <h1><?= Html::encode($this->title) ?></h1>

           <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'title',
                    'description:ntext',
                    'year',
                    'duration',
                    [//Жанр
                        'label' => 'Жанр',
                        'format' => 'raw',
                        'value' => GenreW::widget(['model'=> $model]),
                    ],



                    [ //Рэйтинг
                        'label' => 'Рейтинг',
                        'format' => 'raw',
                        'value' => ProgressBar::widget(['model' => $model]),
                     ],
                    [ //Рэйтинг
                        'label' => 'Рейтинг MPAA',
                        'format' => 'raw',
                        'value' => function($model){
                                $temp = $model->getMpaa($model->raiting_mpaa);
                            return Html::img("$temp",[
                                'alt'=>'MPAA',
                                'style' => 'width:30px;'
                            ]);
                        },

                    ],
                    'countryName'
                ],
            ]) ?>


        </div>
    </div>
    <?php function printComment($commentObj, $model, $level)
    {
    ?>
        <li style="margin-left: <?php $margin = 40 * $level;
        echo "$margin";

        ?>px">
           <b><?= Html::encode($commentObj->createdBy->username); ?></b>

            <i>| <?= Html::encode($commentObj->getTimeCreate()); ?></i>

            <?= Html::a('Add comment', ['film/filial-comment?id=' . $model->id . '&parrentId=' . $commentObj->id],
                ['class' => 'btn btn-primary']) ?>
            <br>
            <p class="commentText">

                <?= Html::encode($commentObj->comment); ?>


            </p>
            <br>
            <hr>
        </li>
    <?php } ?>
</div>


    <?=
    $this->render('_form', [
        'model' => $commentModel,
    ]) ?>

<?php
/** Comments $comment*/
/**
 * @param $model
 * @param $parrentId
 * @param $level
 * @return mixed
 *
 */
function tree($model, $parrentId, $level) //рекурсивная функция
{
    $level += 1;
    foreach ($model->comments as $childcomment) {



        if ($parrentId == $childcomment->parrent_id)
        {

            printComment($childcomment, $model, $level);
            $parrentCommentIdChild = $childcomment->id;
            tree($model, $parrentCommentIdChild, $level);
        }

    }
    $level -=1;
}

foreach ($model->comments as $comment) { ?>
    <?php if ($comment->parrent_id == null) //определяю родительский комментарий
    {

        $level = 1;
        printComment($comment, $model, $level); //печатаю родительский коммент
        $parrentId = $comment->id;
        tree($model, $parrentId, $level);

    }
}
?>