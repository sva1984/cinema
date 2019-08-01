<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Comment;
use frontend\assets\AppAsset;
use frontend\assets\Cinema;
use frontend\components\ProgressBar;
use frontend\components\CommentTree;
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
echo"<pre>";
print_r($model->genres);die();
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
                    [ //Рэйтинг MPAA
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
</div>


    <?=
    $this->render('_form', [
        'model' => $commentModel,
    ]) ?>

<?= CommentTree::widget(['model' => $model]);?>