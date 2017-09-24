<?

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();
include ("../engine/bd.php");
try{
//    Путь шаблона
    $loader = new Twig_Loader_Filesystem('../templates');

//    инициализация twig
    $twig = new Twig_Environment($loader);

//    Подгрузка шаблона
    $template = $twig->loadTemplate('Catalog.tmpl');

//    Передаем в шаблон переменные и значения
    echo $template->render(array(
            'id'=>$id,
            'name'=>$name,
            'price' => $price,
            'description' => $description,
            'parth' => $parth,
        'items' => $item,
    ));

} catch (Exception $e){
    die ('Error: ' . $e->getMessage());
}
?>
<!-- css для страницы каталога -->
<link rel="stylesheet" href="css/container.css">