<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Comment;
use common\models\Staff;
use common\models\Film;
use common\models\Genre;
use common\models\FilmGenre;
use frontend\assets\AppAsset;
use frontend\assets\Cinema;
use frontend\components\ProgressBar;
use frontend\components\CommentTree;
use frontend\components\GenreW;
use frontend\components\FilmStaff;
use frontend\components\SimilarFilms;

AppAsset::register($this);
Cinema::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Film */

/* @var $commentModel common\models\Comment */

//unbug($model);
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
                            'value' => GenreW::widget(['model' => $model]),
                        ],
                        [ //Актёр
                            'label' => 'Актёры',
                            'format' => 'raw',
                            'value' => FilmStaff::widget(['model' => $model, 'professian' => 1])
                        ],
                        [ //Режисёр
                            'label' => 'Режисёр',
                            'format' => 'raw',
                            'value' => FilmStaff::widget(['model' => $model, 'professian' => 2])
                        ],


                        [ //Рэйтинг
                            'label' => 'Рейтинг',
                            'format' => 'raw',
                            'value' => ProgressBar::widget(['model' => $model]),
                        ],
                        [ //Рэйтинг MPAA
                            'label' => 'Рейтинг MPAA',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $temp = $model->getMpaa($model->raiting_mpaa);
                                return Html::img("$temp", [
                                    'alt' => 'MPAA',
                                    'style' => 'width:30px;'
                                ]);
                            },

                        ],
                        'countryName'
                    ],
                ]) ?>


            </div>
        </div>
    <div class="similar-film">
        <?= HTML::tag('h1', HTML::encode('Похожие фильмы'));?>
        <?= SimilarFilms::widget(['model' => $model]);?>
    </div>
    </div>


<?=
    $this->render('_form', [
        'model' => $commentModel,
    ]) ?>


<?= CommentTree::widget(['model' => $model]);?>