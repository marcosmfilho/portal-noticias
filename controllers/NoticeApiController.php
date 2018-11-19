<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\models\Notices;

/**
 * Notices Controller API
 *
 * @author Marcos Soares <marcosmfilho@gmail.com>
 */
class NoticeApiController extends ActiveController
{
    public $modelClass = 'app\models\Notices';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['view']);
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        return $actions;
    }

    public function actionIndex()
    {
        $obj = new \stdClass();
        
        $notices =  new ActiveDataProvider([
            'query' => Notices::find()->select(['id', 'author', 'title', 'body', 'date_created', 'date_updated'])
                                      ->where(['notices_status_id' => 1]),
        ]);

        $obj->notices = $notices->query->all();

        return $obj;
    }

    public function actionView($id)
    {
        $obj = new \stdClass();
        
        $notice =  new ActiveDataProvider([
            'query' => Notices::find()->select(['id', 'author', 'title', 'body', 'date_created', 'date_updated'])
                                      ->where(['notices_status_id' => 1, 'id' => $id]),
        ]);

        $obj->notice = $notice->query->all();

        return $obj;
    }

    public function actionCreate()
    {   
        $model = new Notices();
        
        $obj = new \stdClass();

        $post = Yii::$app->request->post();

        if(!isset($post['author']) || !isset($post['title']) || !isset($post['body'])){
            $obj->message = "Os parâmetros author, title e body são obrigatórios";
            return $obj;
        }
        
        $model->author = $post['author'];
        $model->title = $post['title'];
        $model->body = $post['body'];
        $model->notices_status_id = 1;
        $model->date_created = date('Y-m-d H:i:s');

        if($model->save()){
            $obj->message = "Notícia salva com sucesso";
            return $obj;
        }

        $obj->message = "Não foi possível salvar a notícia";

        return $obj;
    }

    public function actionUpdate()
    {   
        $post = Yii::$app->request->post();
        $obj = new \stdClass();

        if(!isset($post['id'])){
            $obj->message = "O id da Notícia é obrigatório";
            return $obj;
        }

        $model = $this->findModel($post['id']);
        
        isset($post['author']) ? $model->author = $post['author'] : $model->author;
        isset($post['title']) ? $model->title = $post['title'] : $model->title;
        isset($post['body']) ? $model->body = $post['body'] : $model->body;
        $model->date_updated = date('Y-m-d H:i:s');

        if($model->update()){
            $obj->message = "Notícia alterada com sucesso";
            return $obj;
        }

        $obj->message = "Não foi possível alterar a notícia";

        return $obj;
    }

    public function actionDelete()
    {   
        $post = Yii::$app->request->post();
        $obj = new \stdClass();

        if(!isset($post['id'])){
            $obj->message = "O id da Notícia é obrigatório";
            return $obj;
        }

        $model = $this->findModel($post['id']);
        $model->notices_status_id = 2;
        
        if($model->update()){
            $obj->message = "Notícia deletada com sucesso";
            return $obj;
        }

        $obj->message = "Não foi possível deletar a notícia";

        return $obj;
    }

    /**
     * Finds the Notices model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notices the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notices::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}