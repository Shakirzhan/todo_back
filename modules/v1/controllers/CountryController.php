<?php

namespace app\modules\v1\controllers;


use yii\rest\Controller;

class CountryController extends Controller
{
    public $modelClass = 'app\modules\v1\models\Country';

    public function actionRandom()
    {
        return 'random';
    }
}


