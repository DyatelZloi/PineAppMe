<?php
//$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
//$user = json_decode($s, true);
//echo $user['network'].'<br>'; //- соц. сеть, через которую авторизовался пользователь
//echo $user['identity'].'<br>'; //- уникальная строка определяющая конкретного пользователя соц. сети
//echo $user['first_name'].'<br>'; //- имя пользователя
//echo $user['last_name'].'<br>'; //- фамилия пользователя
// В таком случае авторизация происходит не через меня
// Мы должны будем просто получать некоторые данные от социальной сети
// Мы по идее должны перенаправить такого юзера на его страничку по емайл или ещй как-то
$ses = $this->session->all_userdata();
foreach($ses as $data){
    echo "$data".'<br>';
}
?>
<?php echo validation_errors(); ?>
<section>
    <script src="//ulogin.ru/js/ulogin.js"></script>
    <div id="uLogin" data-ulogin="display=small;theme=classic;fields=first_name,email;providers=facebook,vkontakte,twitter,googleplus;redirect_uri=http%3A%2F%2Fpineappme%3A81%2Findex.php;mobilebuttons=0;"></div>
    <?php echo form_open('user/login/') ?>
        <label>
            E-mail: <input type="text" name="email"><br>
        </label>
        <label>
            Пароль: <input type="password" name="password"><br>
        </label>
        <input type="submit" value="Войти">
    </form>
</section>
<br>
<a href="http://pineappme:81/index.php/image/"> На главную</a>
<br>
<?php echo form_open('user/logout/') ?>
<input type="submit" value="Выйти">
</form>