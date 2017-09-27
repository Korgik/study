<?php
/**
 * Created by PhpStorm.
 * User: Akinf
 * Date: 26.09.2017
 * Time: 17:50
 */
//Подключение к БД через PDO на MVC


class  Db{

    public static function getConnection(){
//Подключение путей
        $paramsPath = ROOT. '/configuration/Config.php';
$params = include ($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
//        Задаем кодировку
        $db->exec("set names utf8");
        return $db;
    }
};