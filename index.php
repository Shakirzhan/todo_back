<?php

require 'vendor/autoload.php';

include_once 'app/DataBase.php';
include_once 'app/Api.php';
include_once 'app/MainApi.php';
include_once 'app/User.php';

try {

  $database = new Database();

  $db = $database->getConnection();

    $api = new MainApi($db);

    $api->run();

} 

catch (Exception $e) {

    echo json_encode(Array('error' => $e->getMessage()));

}