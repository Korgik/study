<?php
//скрипт, проверяющий размер загружаемого файла и его тип. Копирует файл и меняет размер
//изображения на заданный (ширина 350px). Создает запись об изображении в БД.

include 'resize.php';

if ($_FILES['userfile']['size']>50000) {
    echo "Файл слишком большой, максимальный размер файла 500 Кб!<br>";
    echo '<br><a href="/">Вернуться на главную страницу</a>';
    return;
}

$type = $_FILES['userfile']['type'];
if (($type != 'image/jpeg')&&($type != 'image/gif')&&($type != 'image/png')) {
    echo "Тип файла $type не поддерживается, используйте JPG или GIF или PNG!<br>";
    echo '<br><a href="/">Вернуться на главную страницу</a>';
    return;
}

$uploaddir = './uploaded/images/';
$thumbpath = './uploaded/';
$sqlthumbpath = '.\\\\uploaded\\\\';
$filename = basename($_FILES['userfile']['name']);
$uploadfile = $uploaddir . $filename;
if (file_exists($uploadfile)) do {
    $arr = pathinfo($uploadfile);
    $uploadfile=$arr[dirname].'/'.$arr[filename].'_.'.$arr[extension];
} while (file_exists($uploadfile));

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    $image = new SimpleImage();
    $image->load($uploadfile);
    $image->resizeToWidth(350);
    $arr = pathinfo($uploadfile);
    $newfilename = $thumbpath.$arr[basename];
    $image->save($newfilename);
    echo "Файл $arr[basename] корректен и был успешно загружен и сжат<br>";
    $sqltable = 'uploaded';
    $sql = "INSERT INTO $sqltable (filename, type, path) VALUES ('$filename','$type','$sqlthumbpath')";
    require 'sqlconnect.php';
    $result = mysqli_query($connection, $sql);
    if (!$result) {
        die('Неверный запрос: '.mysql_error());
    }
    
} else {
    echo "Возможная атака с помощью файловой загрузки!<br>";
}

echo '<br><a href="/">Вернуться на главную страницу</a>';
return;

?>