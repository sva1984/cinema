<?php


use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\assets\Staff;
use frontend\components\CommentTree;

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

        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'name',
            'biography:ntext',
            'birth_date',
            'hieght',
            'profession',
            'country_id',

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
