<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\assets\AppAsset;
use frontend\assets\Cinema;
AppAsset::register($this);
Cinema::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Film */

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
                    [ //Самодельный прогресс бар
                        'label' => 'Рейтинг',
                        'format' => 'raw',
                        'value' => function ($model) {
                           $star = floor($model->raiting);
                           $starPart = - floor((1 - ($model->raiting - $star))*48);
                           $printStar='';
                            $printStar .=' <div class="star">';
                           for($i=0; $i<$star; $i++)
                           {//Отрисовка целых звёзд
                               $printStar .= "<img src='..\images\starfull.jpg'/>";
                           }
                            $printStar .= '</div>';
                           if ($star<5) {
                               $printStar .= '<p class="crop"><a href="#" ><img src="..\images\starfull.jpg" style="margin:0px ';
                               $printStar .= "$starPart";
                               $printStar .= 'px 0px 0px" alt="css template" /></a></p>';
                           }
                            return $printStar;

                        }
                    ],
                    'raiting_mpaa',
                    'countryName'
                ],
            ]) ?>


        </div>
    </div>
</div>
