<?php>
//скрипт, получающий с основной страницы номер id, выбирающий для данного
//id путь к картинке и имя файла и отображающий ее используя html шаблон с
//заменой переменных. Также увеличивает значение счетчика открытий в базе.

include 'sqlconnect.php';
//include 'gallery.php';


//$tpl = file_get_contents('templates/showidpic.tmpl');
$id = $_GET['id'];
$db = $_GET['db'];
$sql = "SELECT filename, path, opened FROM $db WHERE id='$id'";
$result = mysqli_query($connection, $sql);
$sqlnewopened = "UPDATE $db SET opened=opened+1 WHERE id=";


if (mysqli_num_rows($result) != 0) {
    $sqlresult = mysqli_query($connection, $sqlnewopened.$id);
    $row = mysqli_fetch_assoc($result);
    $fullimage = $row["path"].'images\\'.$row["filename"];
//    $image = '<img src="'.$fullimage.'" alt="pic" style="width: 100%;">';
    $count = "Просмотров фото: ".($row["opened"]+1);
    $title = 'picture id='.$id;
} else {
    echo "<h3>В базе $db нет изображения с id=".$id."!</h3>";
    echo '<br><a href="/">Вернуться на главную страницу</a>';
}
mysqli_close($connection);



//Активация шаблона
// формируем массив
$nav = array(
    'primary' => array(
        array('name' => 'Главная', 'url' => '/index.php'),
        array('name' => 'О нас', 'url' => '/About'),
        array('name' => 'Контакты', 'url' => '/Contact'),
        array('name' => 'Отзывы', 'url' => '/feedback'),
    ),
);
//Подключение Twig'a
include 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
    $loader = new Twig_Loader_Filesystem('templates');

    $twig = new Twig_Environment($loader);

    $template = $twig->loadTemplate('showidpic.tmpl');

    echo $template->render(array (
        'nav' => $nav,
        'updated' => '20 сентября 2017',
        'image' => $fullimage,
        'count' => $count,
        'title' => $title,
    ));

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

?>
