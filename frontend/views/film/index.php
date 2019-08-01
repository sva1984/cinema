<?php

use frontend\components\ProgressBar;
use frontend\assets\Cinema;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\film;
use common\models\country;
use common\models\filmGenre;
use frontend\components\GenreW;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
Cinema::register($this);
$this->title = ' C I N E M A ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [//Промо
                'label' => 'Промо',
                'options' => ['style' => 'width: 8%; max-width: 9%;'],
                'format' => 'raw',
                'value' => function($data){
                    return Html::img("$data->img_url",[
                        'alt'=>'Промо',
                        'style' => 'width:100px;'
                    ]);
                },
            ],
//
//            ['class' => 'yii\grid\SerialColumn'], //нумерация строк

            [//ссылка на название
                'label' => 'Название',
                'format' => 'raw',
                'options' => ['style' => 'width: 15%; max-width: 65px;'],
                'value' => function(Film $data){
                    return Html::a(
                        $data->title,
                        "view?id=$data->id",

                        [ //открытие ссылки в новом окне
                            'title' =>  $data->title,
                            'target' => '_blank'
                        ]
                    );
                }
            ],

            'year',
            [//Отображение страны
                'label' => 'Страна',
                'format' => 'raw',
                'value' => 'countryName',

            ],
            [//Жанр
                'label' => 'Жанр',
                'format' => 'raw',
                'value' =>
                    function(Film $data){
                return GenreW::widget(['model'=> $data]);
                }
            ],
            [ //Рэйтинг
                'label' => 'Рейтинг',
                'format' => 'raw',
                'value' =>function(Film $data) {

                    return ProgressBar::widget(['model' => $data]);
                }
            ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
