<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notices-form">

    <?php $form = ActiveForm::begin(['id' => 'notice_form', 
                                    'action' => '/notices/delete?id=' . $model->id]); 
    ?>

    Deseja realmente excluir a notícia <b><?= $model->id ?></b>?
    
    <?php ActiveForm::end(); ?>

</div>

