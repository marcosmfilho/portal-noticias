<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Notices */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Notícias', 'url' => ['index']];

?>
<div class="notices-view">

    <div class="col-md-12">
    
        <div class="col-md-8">
            <p>
                <h2><?= Html::encode($model->title) ?></h2>
                <span><b>Por <?= $model->author?></b></span><br>
                <span style="font-size:10px"><?= date_format(date_create($model->date_created), 'd/m/Y H:i')?></span>
                <span style="font-size:10px"><?= isset($model->date_updated) ? (" - Atualizado em " . date_format(date_create($model->date_updated), 'd/m/Y H:i')) : "" ?></span>
            </p>

            <hr>
            
            <p>
                <?= Html::encode($model->body) ?>
            </p>
        </div>

    </div>

</div>
