<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notices-form">

    <?php $form = ActiveForm::begin(['id' => 'notice_form']); ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textArea(['maxlength' => true]) ?>
    
    
    <?php ActiveForm::end(); ?>

</div>

