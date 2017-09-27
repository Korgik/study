<?php
// Контроллер для Регистрации

class C_User extends C_Base
{

//    Конструктор
    // Подключаем вид

    public function action_authorization(){
        $this->title .= '::Авторизация';
        $this->content = $this->Template('v/v_auth.php');
    }

    public function action_Register()
    {
        $this->title .= '::Регистрация';
        $this->content = $this->Template('v/v_register.php');
        // Объявим переменные, чтобы не было ошибок
        $login = false;
        $email = false;
        $password = false;
        //Обработка формы
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!User::checkPassword($password)) $errors[] = 'Вы не ввели пароль, пароль меньше 6-х символов';
            if (!User::checkName($login)) $errors[] = 'Логин меньше 3-х символов';
            if (!User::checkEmail($email)) $errors[] = 'Не верно указан E-mail';
            else {
                // Проверяем существует ли пользователь
                $checkEmail = User::checkUserEmail($email);
                $checkLogin = User::checkUserLogin($login);
                if ($checkLogin == true) $errors[] = 'Пользователь с таким Логином, уже зарегистрирован, введите другой Логин';
                if ($checkEmail == true) $errors[] = 'Пользователь с таким E-mail, уже зарегистрирован, введите другой E-mail';
                else {
                    $hashed_password = User::generateHash($password); // Сохраняем Хеш пароля
                    if (!User::register($login, $email, $hashed_password)) $errors[] = 'Ошибка Базы Данных';
                }
            }
        }


    }
}

