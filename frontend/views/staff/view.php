<?php


use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\assets\Staff;

/* @var $this yii\web\View */
/* @var $model common\models\Staff */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
Staff::register($this);

?>
<div class="container">
    <div class="row">
        <div class="staff-img">
            <!--            Показываем картинку       -->
            <p><img src="<?= $model->img_url ?>" alt=""></p>
           </div>



<div class="staff-view">

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
//            'id',
            'name',
            'biography:ntext',
            'birth_date',
            'hieght',
            'profession',
            'country_id',
//            'img_url:url',
        ],
    ]) ?>

</div>
    </div>
</div>