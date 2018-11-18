<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notices-index">

    <h1><?= Html::encode("Notícias") ?></h1>

    <p>
        <?= Html::a('Create Notices', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-secondary">Secondary</button>
    <button type="button" class="btn btn-success">Success</button>
    <button type="button" class="btn btn-danger">Danger</button>
    <button type="button" class="btn btn-warning">Warning</button>
    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-light">Light</button>
    <button type="button" class="btn btn-dark">Dark</button>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author',
            'title',
            //'body',
            //'image',
            //'date_created',
            //'date_updated',
            //'notices_status_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => [
            'id' => 'theDatatable',
            'class'=>'table table-striped table-bordered'
            ],
    ]); ?>
</div>
