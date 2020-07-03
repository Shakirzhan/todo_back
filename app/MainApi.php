<?php

class MainApi extends Api
{
    private $conn;
    private $apiName = '/api';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function run()
    {


        $router = new Buki\Router();

        $router->get("/", function () {

            return 'Main Page';

        });

        $router->get("{$this->apiName}", function () {

            $arr = [
                [
                    'id' => 1,
                    'name' => 'name 1'
                ],
                [
                    'id' => 2,
                    'name' => 'name 2'
                ],
                [
                    'id' => 3,
                    'name' => 'name 3'
                ]
            ];

            echo $this->response($arr, 200);

        });
        $router->get("{$this->apiName}/view", function () {

            return 'API';

        });

        $router->run();

    }
}