<?php

namespace app\modules\v1\controllers;


use app\modules\v1\models\MainList;
use yii\filters\auth\QueryParamAuth;
use Yii;

class MainListController extends ApiController
{
    public $modelClass = 'app\modules\v1\models\MainList';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        
        $behaviors['authenticator']['class'] = QueryParamAuth::className();
        
        $behaviors['authenticator']['only'] = ['post'];
        
        return $behaviors;
    }

    public function actionDoList()
    {
        return MainList::find()->where(['is_deleted' => MainList::STATUS_ACTIVE])->orderBy(['id' => SORT_DESC])->all();
    }

    public function actionCreateItem() 
    {
        $params = Yii::$app->request->bodyParams;

        $model = new MainList();

        $model->name = $params['name'];

        $model->user_id = 1;
        
        $model->is_deleted = MainList::STATUS_ACTIVE;

        $model->save();

        return $model;
    }
    
    public function actionDeletedTask($id) 
    {
        $model = MainList::findOne($id);
        
        $model->is_deleted = MainList::STATUS_DELETED;
        
        $model->save();
        
        return $model;
    }
}


