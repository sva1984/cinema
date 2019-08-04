<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GenreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Genres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genre-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [//ссылка на название
                'label' => 'Жанры',
                'format' => 'raw',
//                'options' => ['style' => 'width: 15%; max-width: 65px;'],
                'value' => function(\common\models\Genre $data){
                    return Html::a(
                        $data->genre,
                        "view?id=$data->id",

                        [ //открытие ссылки в новом окне
                            'title' =>  $data->genre,
                            'target' => '_blank'
                        ]
                    );
                }
            ],


        ],
    ]); ?>


</div>
