<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\film;
use common\models\country;
use common\models\filmGenre;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Films';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            [//Промо
                'label' => 'Промо',
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

//            'id',
//            'title',
//            'description:ntext',
            [//ссылка на название
                'label' => 'Название',
                'format' => 'raw',
                'value' => function(Film $data){
                    return Html::a(
                        $data->title,
                        "view?id=$data->id",
                        [
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
                'value' => function(Film $data){
                    return $data->country->country;
                }
            ],
            [//Жанр
                'label' => 'Жанр',
                'format' => 'raw',
                'value' => function(Film $data){
                     foreach($data->genres as $genre)
                    {
                    return $genre->genre;
                    };
                }
            ],
//            'duration',
            //'country_id',
            'raiting',
            //'raiting_mpaa',
//            'img_url:image',
//            'video_url:url',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
