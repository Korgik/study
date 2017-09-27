<?php
/**
 * Created by PhpStorm.
 * User: Akinf
 * Date: 26.09.2017
 * Time: 20:16
 */?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
<form action=" " method="post" class="form-login" style="display: block; width: 400px; margin: 0 auto;  padding: 20px; text-align: center;">
    <h2><center><?=$title?></h2></center><br>
    <input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/><br><br>
    <input type="text" name="login" placeholder="Логин" value="<?php echo $login; ?>"/><br><br>
    <input type="password" name="password" placeholder="Пароль" value="<?php echo $_POST['password']; ?>"/><br><br>
<!--    дальше этого еще нет в обработчике-->
<!--    <input type="text" name="name" placeholder="Ваше имя" value="--><?php //echo $name?><!--"><br><br>-->
<!--    <p><input type="radio" name="Admin" value="--><?php //echo $Admin?><!--"> Админ сайта</p>-->
<!--    <p><input type="radio" name="Admin" value="--><?php //echo $NotAdmin?><!--">Рядовой пользователь</p>-->
    <div class="os"></div>
    <input type="submit" name="submit" class="btn btn-default" style="width: 130px;" value="Зарегестрировать" />
    <div class="os"></div>

</form>
</body>
</html>
