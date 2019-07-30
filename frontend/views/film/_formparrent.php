<?php

use common\models\Comment;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $filialComment common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $parentCommentId int */
?>

<div class="articals-form">

    <?php $form = ActiveForm::begin(['action' => ['film/filial-comment?id=' . $model->id]]);

    //echo $form->field($filialComment, 'parrent_comment_id')->hiddenInput(['value' => $filialComment->parrent_comment_id])->label(false);

    ?>

    <?= $form->field($filialComment, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success'])?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
