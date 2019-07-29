<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Film */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="film-view">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description:ntext',
            'year',
            'duration',
            'raiting',
            [
                'label' => 'Рейтинг',
                'format' => 'raw',
                'value' => function ($model) {
                    //$bar = "Html::tag(\'div\', ' ', [\'class\' => [\'progress\']])" . "Html::tag('div', ' ', ['class' => ['progress-bar'], 'style'=>['width:80%']])";
                    $bar =intval($model->raiting*20);

                   // return  '<div class="progress">' . '<div class="progress-bar" style="width:'.$bar.'%">';
                    return '<div class="star-ratings-sprite"><span style="width:52%" class="star-ratings-sprite-rating"></span></div>';
                }
            ],
            'raiting_mpaa',
            'countryName'
        ],
    ]) ?>

    <div class="progress">
        <div class="progress-bar" style="width:80%">

            $options = ['class' => ['progress']];
            echo Html::tag('div', " ", ['class' => ['progress']]);
            echo Html::tag('div', " ", ['class' => ['progress-bar'], 'style'=>['width:80%']]);

        </div>
