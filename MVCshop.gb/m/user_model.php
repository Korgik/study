<?php
/**
 * Created by PhpStorm.
 * User: Akinf
 * Date: 26.09.2017
 * Time: 19:20
 */
//Создание Класса Юзера с Функцией хеширования пароля
class User{
    function generateHash($password){
        if(defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $salt = '$2y$11$' . substr(md5(uniqid(rand(),true)),0,22);
            return crypt($password,$salt);
        }
    }
//    не менее 2ух символов в логине
    public static function checkName($name)
    {
        if (strlen($name) >= 2) return true;
        else return false;
    }
//    не менее 6ти символов в пароле
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) return true;
        else return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    }
//    Проверка Емайл и логина, нет ли в базе даных этих данных
    public static function checkUserEmail($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return true;
        else return false;
    }

    public static function checkUserLogin($login)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE login = :login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return true;
        else return false;
    }
    //запись данных в базу данных
    public static function register($login, $email, $password)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO users (login, email, password) VALUES (:login, :email, :password)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
}