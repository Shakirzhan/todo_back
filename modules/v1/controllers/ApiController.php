<?php

namespace app\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class ApiController extends ActiveController
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['class'] = QueryParamAuth::className();

        $behaviors['authenticator']['tokenParam'] = 'hash';

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                // restrict access to
                'Origin' => ['*'],
                // Allow  methods
                'Access-Control-Request-Method' => ['POST', 'PUT', 'OPTIONS', 'GET', 'DELETE'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Headers' => ['*'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                //'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['*'],
            ],
        ];

        return $behaviors;
    }

}