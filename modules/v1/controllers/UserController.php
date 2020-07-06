<?php

namespace app\modules\v1\controllers;


use app\modules\v1\forms\LoginForm;
use app\modules\v1\forms\RegForm;
use yii\rest\Controller;
use Yii;

class UserController extends Controller
{
    public $modelClass = 'app\modules\v1\models\User';

    public function actionReg()
    {
        $model = new RegForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($result = $model->reg()) {
            return $result;
        } else {
            return $model;
        }
    }

    public function actionAuth()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($token = $model->auth()) {
            return $token;
        } else {
            return $model;
        }
    }
}


