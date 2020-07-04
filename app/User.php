<?php
// объект 'user'
class User {

    // подключение к БД таблице "users"
    private $conn;
    private $table_name = "users";

    // свойства объекта
    public $id;
    public $login;
    public $password;

    // конструктор класса User
    public function __construct($db) {
        $this->conn = $db;
    }

    // Создание нового пользователя
    function create() {

        // Вставляем запрос
        $query = "INSERT INTO {$this->table_name} SET login = :login, password = :password";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // инъекция
        $this->login=htmlspecialchars(strip_tags($this->login));
        $this->password=htmlspecialchars(strip_tags($this->password));

        // привязываем значения
        $stmt->bindParam(':login', $this->login);

        // для защиты пароля
        // хешируем пароль перед сохранением в базу данных
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);

        // Выполняем запрос
        // Если выполнение успешно, то информация о пользователе будет сохранена в базе данных
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // здесь будет метод emailExists()
    function loginExists(){

        // запрос, чтобы проверить, существует ли электронная почта
        $query = "SELECT id, password FROM {$this->table_name} WHERE login = ? LIMIT 0,1";

        // подготовка запроса
        $stmt = $this->conn->prepare( $query );

        // инъекция
        $this->login=htmlspecialchars(strip_tags($this->login));

        // привязываем значение e-mail
        $stmt->bindParam(1, $this->login);

        // выполняем запрос
        $stmt->execute();

        // получаем количество строк
        $num = $stmt->rowCount();

        // если электронная почта существует,
        // присвоим значения свойствам объекта для легкого доступа и использования для php сессий
        if($num>0) {

            // получаем значения
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // присвоим значения свойствам объекта
            $this->id = $row['id'];
            $this->login = $row['login'];
            $this->password = $row['password'];

            // вернём 'true', потому что в базе данных существует электронная почта
            return true;
        }

        // вернём 'false', если адрес электронной почты не существует в базе данных
        return false;
    }
}