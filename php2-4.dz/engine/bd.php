<?php

include '../config/config.php';

try{
//    Соединение с бд
    $connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
    $db = new PDO($connect_str,DB_USER,DB_PASS);
//    выберем строки
    $result = $db->query("SELECT * FROM shop_product");
//    Проверка на ошибки
    $error_array = $db->errorInfo();
    if($db->errorCode() != 0000)
        echo "SQL error: " . $error_array[2] . '<br><br>';
    while ($item=$result->fetch()){
        $id=$item["item_id"];
        $name=$item["name"];
        $price=$item["price"];
        $description=$item["description"];
        $parth=$item["parth-image"];
//        echo $item;

    }
}
catch (PDOException $e){
    die("Error: ".$e->getMessage());
}