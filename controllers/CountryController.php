<?php

namespace app\controllers;

use yii\rest\ActiveController;


class CountryController extends ActiveController
{
    public $modelClass = 'app\models\country';

    public function actions()
    {
        $actions = [
            'index' => [
                'class' => \app\models\IndexAction::class,
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
        ];

        return array_merge(parent::actions(), $actions);
    }

    public function actionIndex()
    {
        return 'new111111111111';
    }
}
