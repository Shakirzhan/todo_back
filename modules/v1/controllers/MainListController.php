<?php

namespace app\modules\v1\controllers;


use app\modules\v1\models\MainList;
use Yii;

class MainListController extends ApiController
{
    public $modelClass = 'app\modules\v1\models\MainList';

    public function behaviors()
    {
        return parent::behaviors();
    }

    public function actionDoList()
    {
        return MainList::find()->all();
    }

    public function actionCreateItem() {
        $params = Yii::$app->request->bodyParams;

        $model = new MainList();

        $model->name = $params['name'];

        $model->user_id = 1;

        $model->save();

        return $model;
    }
}


