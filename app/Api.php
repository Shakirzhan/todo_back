<?php

abstract class Api
{
	public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        //header("Content-Type: application/json");
        //header("Access-Control-Allow-Origin: http://authentication-jwt/");
        header("Content-Type: application/json; charset=UTF-8");
        //header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	}

	protected function response($data, $status = 500) {
        header("HTTP/1.1 {$status} {$this->requestStatus($status)}");
        return json_encode($data);
    }

    private function requestStatus($code) {
        $status = array(
            200 => 'OK',
            401 => 'Err auth',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code])?$status[$code]:$status[500];
    }
}