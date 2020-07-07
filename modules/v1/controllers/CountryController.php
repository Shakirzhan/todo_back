<?php

namespace app\modules\v1\controllers;


class CountryController extends ApiController
{
    public $modelClass = 'app\modules\v1\models\Country';

    public function actionRandom()
    {
        return 'random';
    }
}


