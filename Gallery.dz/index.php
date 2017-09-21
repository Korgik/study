<?
//include 'showimages.php';
//Скрипт для пожключения к БД и показу картинок.
$sqltable = 'main';
include 'showimages.php';
$sqltable = 'uploaded';
include 'showimages.php';

$nav = array(
    'primary' => array(
        array('name' => 'Главная', 'url' => '/index.php'),
        array('name' => 'О нас', 'url' => '/About'),
        array('name' => 'Контакты', 'url' => '/Contact'),
        array('name' => 'Отзывы', 'url' => '/feedback'),
    ),
);
//$Image = array(
//    'main' => array (
//        array('qeury'=> '$sqltable='main'','active'=>'include 'showimages.php''),
//    ),
//    'up' => array(
//        array('query' => '$sqltable='uploaded'', 'active'=>'include'showimages.php''),
//    )
//);
//Подключение шаблона к главной странице
include 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {

    $loader = new Twig_Loader_Filesystem('templates');

    $twig = new Twig_Environment($loader);

    $template = $twig->loadTemplate('index.tmpl');


    echo $template->render(array (
        'nav' => $nav,
        'updated' => '20 сентября 2017',
        'photo' => $Item_photo,
        'seen' => $seen_icon,
        'open' => $opened_icon,
    ));
} catch (Exception $e){
    die('Error:'. $e->getMessage());
}
