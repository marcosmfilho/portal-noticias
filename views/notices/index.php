<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notícias';
//$this->params['breadcrumbs'][] = $this->title;
?>

<script src="/js/jquery-3.3.1.min.js"></script>

<div class="notices-index">

    <div class="col-md-12">
        <h3><?= $this->title ?></h3>
    </div>

    <div class="col-md-12">
        <p style="text-align: right">
            <button type="button" class="btn btn-primary new-notice">Criar nova notícia</button>
        </p>
        <br>
    </div>

    <div class="col-md-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}{pager}',
            'columns' => [
                'id',
                [
                    'label' => 'Autor',
                    'value' => function ($dataProvider) {
                        return $dataProvider->author;
                    }
                ],
                [
                    'label' => 'Título da Notícia',
                    'value' => function ($dataProvider) {
                        return $dataProvider->title;
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Actions',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                      'view' => function ($url, $model) {
                          return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                      'title' => Yii::t('app', 'Ver notícia completa'),
                          ]);
                      },
          
                      'update' => function ($url,$model) {
                          return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                      'title' => Yii::t('app', 'Alterar notícia'),
                                      'class' => 'update-notice',
                                      'notice_id' => $model->id
                          ]);
                      },
                      'delete' => function ($url, $model) {
                          return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                      'title' => Yii::t('app', 'Deletar Notícia'),
                                      'class' => 'delete-notice',
                                      'notice_id' => $model->id
                          ]);
                      }
          
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                      if ($action === 'view') {
                          $url ='/notices/view?id='.$model->id;
                          return $url;
                      }
                    }
                ]
            ],
        ]); ?>
    </div>

    <div class="modal" id="modal-new-notice" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Criar Notícia</h3>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success submit-notice">Criar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-update-notice" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Alterar Notícia</h3>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary submit-notice">Alterar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-delete-notice" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Deletar Notícia</h3>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger submit-notice">Deletar</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $('.new-notice').click(function(){

        $('#modal-new-notice .modal-body').html("");
        $.ajax({
            type: 'POST',
            url: "/notices/create"
        }).done(function(res) {
            $('#modal-new-notice .modal-body').html(res);
            $('#modal-new-notice').modal('show');
        });
    });

    $('.update-notice').click(function(){
        let noticeID = $(this).attr('notice_id');
        $('#modal-update-notice .modal-body').html("");
        $.ajax({
            type: 'POST',
            url: "/notices/update?id=" + noticeID
        }).done(function(res) {
            $('#modal-update-notice .modal-body').html(res);
            $('#modal-update-notice').modal('show');
        });
    });

    $('.delete-notice').click(function(){
        let noticeID = $(this).attr('notice_id');
        $('#modal-delete-notice .modal-body').html("");
        $.ajax({
            type: 'POST',
            url: "/notices/delete-index?id=" + noticeID
        }).done(function(res) {
            $('#modal-delete-notice .modal-body').html(res);
            $('#modal-delete-notice').modal('show');
        });
    });

    $('.submit-notice').click(function(){
        $('#notice_form').submit();
    });

    
</script>
