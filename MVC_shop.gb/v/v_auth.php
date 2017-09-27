<!--Страница с регистрацией-->
<div style="color: red; font-size: 14px; padding: 20px; margin: 0 auto; display: block; width:400px;">

<?php if (isset($errors) && is_array($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
</div>

<form action="" method="post" class="form-login" style="display: block; width: 400px; margin: 0 auto;  padding: 20px; text-align: center;">
    <h2><center>Авторизация</h2></center><br>
    <input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/><br><br>
    <input type="text" name="login" placeholder="Логин" value="<?php echo $login; ?>"/><br><br>
    <input type="password" name="password" placeholder="Пароль" value="<?php echo $_POST['password']; ?>"/><br><br>
    <div class="os"></div>
    <input type="submit" name="submit" class="btn btn-default" style="width: 120px;" value="Вход" />
    <div class="os"></div>
    <div style="font-size: 14px; color: #777;">
        регистрация на сайте <a href="index.php?c=user&act=Register">зарегистрируйтесь</a>.
    </div>
</form>