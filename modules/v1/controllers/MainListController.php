<?php

namespace app\modules\v1\controllers;


use app\modules\v1\models\MainList;

class MainListController extends ApiController
{
    public $modelClass = 'app\modules\v1\models\MainList';

    public function actionDoList()
    {
        return MainList::find()->all();
    }
}


