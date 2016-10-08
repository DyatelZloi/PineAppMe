<!DOCTYPE html>
    <html lang="en">
        <head>
            <title><?php $title = !empty($title) ? $title : 'Какой-то тайтл'; echo $title?></title>
            <meta charset="UTF-8">
            <script type="text/javascript" src="/../../js/jquery-3.1.0.min.js"></script>
            <script type="text/javascript" src="/../../js/scripts.js"></script>
        </head>
        <body>
            <?php if ($this->session->userdata('id_user') == null):?>
                <section>
                    <script src="//ulogin.ru/js/ulogin.js"></script>
                    <div id="uLogin" data-ulogin="display=small;theme=classic;fields=first_name,email;providers=facebook,vkontakte,twitter,googleplus;redirect_uri=http%3A%2F%2Fpineappme%3A81%2Findex.php%2Fuser%2FloginFromULogin;mobilebuttons=0;"></div>
                    <!--<div id="uLogin" data-ulogin="display=small;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=http%3A%2F%2Fpineappme%3A81%2Findex.php%2Fauth;mobilebuttons=0;"></div>-->
                    <?php echo form_open('user/login2/') ?>
                        <?php echo validation_errors(); ?>
                        <label>
                            E-mail: <input type="text" name="email"><br>
                        </label>
                        <label>
                            Пароль: <input type="password" name="password"><br>
                        </label>
                        <input type="submit" value="Войти">
                    </form>
                    <a href="<?php echo SITE_NAME?>index.php/user/registration"> Зарегестрироваться </a>
                </section>
            <?php endif; ?>
            <br>
            <a href="<?php echo SITE_NAME?>index.php/image/"> На главную</a>
            <?php if ($this->session->userdata('id_user') != null) :?>
                <!-- Прошлый вариант выхода, теперь используем ссылку, котороя редиректит
                <?php echo form_open('user/logout/') ?>
                    <input type="hidden" >
                    <input type="submit" value="Выйти">
                </form>
                -->
                <a href="<?php echo SITE_NAME?>index.php/user/logout/1">Выйти</a>
                <br>
                <a href="<?php echo SITE_NAME?>index.php/user/home_page/<?php echo $this->session->userdata('id_user') ?>">Профиль</a>
                <br>
            <?php endif; ?>
            <br>
            <a href="<?php echo SITE_NAME?>index.php/image/getPopular"> Популярные </a>
            <a href="<?php echo SITE_NAME?>index.php/image/getFavourite"> Интересные </a>
            <a href="<?php echo SITE_NAME?>index.php/user/getAllUsers"> Люди</a>
        <?php
                if (!empty($_SERVER['HTTP_CLIENT_IP'])){
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                echo 'Ваш ip - '.$ip;
        ?>