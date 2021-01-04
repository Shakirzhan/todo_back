<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Tasks;
use Yii;
use app\modules\v1\forms\CreateTask;
use app\modules\v1\forms\DeleteTask;
use app\modules\v1\forms\DeleteTaskSome;

class TasksController extends ApiController
{
    public $modelClass = 'app\modules\v1\models\Tasks';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        
        return $behaviors;
    }

    public function actionDoList()
    {
        return Tasks::find()
        ->where([
            'is_deleted' => Tasks::STATUS_ACTIVE, 
            'user_id' => \Yii::$app->user->id
        ])
        ->orderBy(['id' => SORT_DESC])
        ->all();
    }

    public function actionCreateItem() 
    {
        $model = new CreateTask();
        if ($model->load(Yii::$app->request->bodyParams, '') && $result = $model->save()) {
            return $result;
        } else {
            return $model;
        }
    }
    
    public function actionDeletedTask($id) 
    {
        $model = new DeleteTask();
        
        $model->id = $id;
        
        if ($result = $model->delete()) {
            return $result;
        } else {
            return $model;
        }
    }
    
    public function actionDeletedTaskSome()
    {
        $model = new DeleteTaskSome();
        if ($model->load(Yii::$app->request->bodyParams, '') && $result = $model->delete()) {
            return $result;
        } else {
            return $model;
        }
    }
}


