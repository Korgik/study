<?php
//скрипт, получающий из БД имена файлов и путь к ним и выводящий их на страницу.
//так же при отображении увеличивает значение количества просмотров в базе
//include 'index.php'
include 'sqlconnect.php';

$sql = "SELECT id, filename, path, seen, opened FROM $sqltable ORDER BY opened DESC";
$sqlnewseen = "UPDATE $sqltable SET seen=seen+1 WHERE id=";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $sqlres = mysqli_query($connection, $sqlnewseen.$row["id"]);
        $thumb = $row["path"].$row["filename"];
        $fullimage = $row["path"].'images\\'.$row["filename"];
        $seen = $row["seen"];
        $opened = $row["opened"];
        echo '<div class="imageinner">';
        echo '<div class="pic">';
        echo '<a href=/showidpic.php?id='.$row["id"].'&db='.$sqltable.' target="_blank"><img src="'.$thumb.'" alt="pic"></a>';
        echo '</div>';
        echo '<div class="textlabel">';
        echo '<div class="seen">';
        echo '<i class="seen_icon"></i><span class="seen_count">'.$seen.'</span></div>';
        echo '<div class="opened">';
        echo '<i class="opened_icon"></i><span class="opened_count">'.$opened.'</span>';
        echo '</div></div></div>';
//        Переменные
//        $opened_icon = '<i class="opened_icon"></i><span class="opened_count">'.$opened.'</span>';
//        $seen_icon = '<i class="seen_icon"></i><span class="seen_count">'.$seen.'</span></div>';
//        $Item_photo = '<a href=/showidpic.php?id='.$row["id"].'&db='.$sqltable.' target="_blank"><img src="'.$thumb.'" alt="pic"></a>';
    }
} else {
    echo "Изображений в БД не найдено";
}

mysqli_close($connection);
?>