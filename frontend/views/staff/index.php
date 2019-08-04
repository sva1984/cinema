<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Staff', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'name',
 [//ссылка на название
                'label' => 'Ф.И.О.',
                'format' => 'raw',
//                'options' => ['style' => 'width: 15%; max-width: 65px;'],
                'value' => function(\common\models\Staff $data){
                    return Html::a(
                        $data->name,
                        "view?id=$data->id",

                        [ //открытие ссылки в новом окне
                            'title' =>  $data->name,
                            'target' => '_blank'
                        ]
                    );
                }],
            'birth_date',
            'hieght',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
