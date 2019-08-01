<?php

use common\models\Comment;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $filialComment common\models\Comment */
/* @var $model common\models\Film */
/* @var $form yii\widgets\ActiveForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $parentId int */
?>

<div class="film-form">

    <?php $form = ActiveForm::begin(['action' => ['staff/filial-comment?id=' . $model->id . '&parrentId=' . $parentId]]);

    ?>

    <?= $form->field($filialComment, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success'])?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
