<?php

abstract class Api
{
	public function __construct()
	{

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