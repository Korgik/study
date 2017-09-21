<?php
//скрипт подключения к БД

$sqlserver = "localhost";
$sqluser = "root";
$sqlpass = "";
$sqlbase = "gallerydb";

$connection = mysqli_connect($sqlserver, $sqluser, $sqlpass, $sqlbase);

if (!$connection) {
	echo "Ошибка: Невозможно установить соединение с MySQL<br>";
	echo "<br>Код ошибки errno: " . mysqli_connect_errno();
	echo "<br>Текст ошибки error: " . mysqli_connect_error();
	exit;
}

?>