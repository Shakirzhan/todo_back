<?php

namespace app\modules\v1\controllers;


use app\modules\v1\forms\LoginForm;
use app\modules\v1\forms\RegForm;
use Yii;
use yii\filters\AccessControl;

class UserController extends ApiController
{
    public $modelClass = 'app\modules\v1\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ]
            ],
        ];

        return $behaviors;
    }

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


