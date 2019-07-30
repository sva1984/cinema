<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Comment;
use frontend\assets\AppAsset;
use frontend\assets\Cinema;
use frontend\components\ProgressBar;

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
                    [ //Рэйтинг
                        'label' => 'Рейтинг',
                        'format' => 'raw',
                        'value' => ProgressBar::widget(['model' => $model]),
                     ],
                    'raiting_mpaa',
                    'countryName'
                ],
            ]) ?>


        </div>
    </div>
    <?php function printComment($item, $model, $n)
    {
    ?>
        <li style="margin-left: <?php $margin = 40 * $n;
        echo "$margin";
        //        echo '100';
        //    else echo '40';
        ?>px">
           <b><?= Html::encode($item->createdBy->username); ?></b>

            <i>| <?= Html::encode($item->getTimeCreate()); ?></i>

            <?= Html::a('Add comment', ['film/filial-comment?id=' . $item->id],
                ['class' => 'btn btn-primary']) ?>
            <br>
            <p class="commentText">

                <?= Html::encode($item->comment); ?>


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