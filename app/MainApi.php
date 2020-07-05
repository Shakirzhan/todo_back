<?php

use \Firebase\JWT\JWT;

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

        $router->post("{$this->apiName}/user/registration", function () {
            $post = $_POST;
            $user = new User($this->conn);
            $user->login = $post['login'];
            $user->password = $post['password'];
            if ( !empty($user->login) && !empty($user->password) && $user->create() ) {
                echo $this->response(array("message" => "Пользователь был создан."), 200);
                return;
            } else {
                echo $this->response(array("message" => "Невозможно создать пользователя."), 400);
                return;
            }
        });

        $router->post("{$this->apiName}/user/authorization", function () {
            $post = $_POST;

            $user = new User($this->conn);

            $user->login = $post['login'];
            $login_exists = $user->loginExists();

            if ( $login_exists && password_verify($post['password'], $user->password) ) {

                $token = array(
                    "iss" => $iss,
                    "aud" => $aud,
                    "iat" => $iat,
                    "nbf" => $nbf,
                    "data" => array(
                        "id" => $user->id,
                        "login" => $user->login
                    )
                );

                $jwt = JWT::encode($token, $key);
                echo $this->response(array(
                    "message" => "Успешный вход в систему.",
                    "jwt" => $jwt
                ), 200);
                return;

            } else {
                echo $this->response(array("message" => "Ошибка входа."), 401);
                return;
            }
        });

        $router->post("{$this->apiName}/user/main_authorization", function () {
            $post = json_decode(file_get_contents("php://input"));

            $user = new User($this->conn);

            $user->login = $post->login;
            $login_exists = $user->loginExists();

            if ( $login_exists && password_verify($post->password, $user->password) ) {

                $token = array(
                    "iss" => $iss,
                    "aud" => $aud,
                    "iat" => $iat,
                    "nbf" => $nbf,
                    "data" => array(
                        "id" => $user->id,
                        "login" => $user->login
                    )
                );

                $jwt = JWT::encode($token, $key);
                echo $this->response(array(
                    "message" => "Успешный вход в систему.",
                    "jwt" => $jwt
                ), 200);
                return;

            } else {
                echo $this->response(array("message" => "Ошибка входа."), 401);
                return;
            }
        });

        $router->run();

    }
}