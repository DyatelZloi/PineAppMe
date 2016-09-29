<!DOCTYPE html>
<html lang="ru" class="reg_html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- адаптация под телефоны -->
    <meta name="description" content="Pineappme"> <!-- описание страницы (записывать в content="сюда") -->
    <meta name="keywords" content="Pineappme"> <!-- теги (записывать в content="сюда") -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/media.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic" rel="stylesheet">

    <title>Регистрация - Pineappme</title> <!-- Название страницы отображаемое в окне браузера сверху -->

    <script>
        // Кнопка "Далее" будет неактивна, пока не будет введен Email.
        function checkParams() {
            var email = $('#reg_email').val();

            if(email.length != 0) {
                $('#reg_submit').removeAttr('disabled');
            } else {
                $('#reg_submit').attr('disabled', 'disabled');
            }
        }
    </script>
</head>

<body class="registration_document">

    <section class="registration">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="hello">Добро пожаловать!</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="logo_dots">
                        <i class="fa fa-circle" aria-hidden="true"></i>
                        <i class="fa fa-circle" aria-hidden="true"></i>
                        <i class="fa fa-circle" aria-hidden="true"></i>
                        <i class="fa fa-circle" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="enter_site">
                        Используй аккаунт в социальных сетях
                    </p>
                </div>
            </div>
            <div class="row">
                <script src="//ulogin.ru/js/ulogin.js"></script>
                <ul class="social_enter" id="uLogin" data-ulogin="display=buttons;fields=first_name,email;
                redirect_uri=http%3A%2F%2Fpineappme%3A81%2Findex.php%2Fuser%2FloginFromULogin;">
                    <li ><a class="fb_soc" data-uloginbutton="facebook"><img src="../../img/fb_icon_reg.png" alt="facebook"></a></li>
                    <li><a class="vk_soc" data-uloginbutton="vkontakte"><img src="../../img/vk_icon_reg.png" alt="vk"></a></li>
                    <li><a class="tw_soc" data-uloginbutton="googleplus"><img src="../../img/tw_icon_reg.png" alt="twitter"></a></li>
                    <li><a class="go_soc" data-uloginbutton = "vkontakte"><img src="../../img/go_icon_reg.png" alt="google plus"></a></li>
                </ul>
            </div>
            <div class="row">
                <div class="email_wrap">
                    <p class="email_enter">или используй свой адрес эл. почты</p>
                    <?php echo form_open('user/registration/', array('class' => "reg_form")) ?>
                        <input id="reg_email" type="email" placeholder="Адрес эл. почты" name="email" value="<?php echo set_value('email'); ?>" onkeyup='checkParams()'>
                        <!-- Очень глупо делать регистрацию только по почте, ведь любой желающий сможет авторизоваться зная почту, нужен ещё и пароль.
                            <input id="reg_email" type="text"  name="id_user" placeholder="ID пользователя" value="<?php echo set_value('id_user'); ?>">
                            <input id="reg_email" type="text" name="name" placeholder="Имя" value="<?php echo set_value('name'); ?>">
                        -->
                            <input id="reg_email" type="password" placeholder="Пароль" name="password" value="<?php echo set_value('password'); ?>">
                        <button id="reg_submit" disabled>Далее</button>
                    </form>
                    <p class="rules">Создавая аккаунт, ты подтверждаешь что прочитал и принял<br>
                        <a class="rules_link" href="#">Правила сервиса</a></p>
                </div>
            </div>
        </div>
        <div class="line_background"></div>
    </section>

<!--
<section>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('user/registration/') ?>
        <label>
            Айди
            <input type="text" name="id_user" value="<?php echo set_value('id_user'); ?>"><br>
        </label>
        <br>
        <label>
            Имя
            <input type="text" name="name" value="<?php echo set_value('name'); ?>"><br>
        </label>
        <br>
        <label>
            email
            <input type="email" name="email" value="<?php echo set_value('email'); ?>"><br>
        </label>
        <br>
        <label>
            пароль
            <input type="password" name="password" value="<?php echo set_value('password'); ?>"><br>
        </label>
        <br>
        <label>
            Загрузить картинку
            <input type="file" name="userfile" size="20" /><br>
        </label>
        <br>

        <input type="submit" value="Отправить">
    </form>
</section>
-->
    <script src="../../js/flipclock.min.js"></script>
    <script src="../../js/common.js"></script>
</body>

</html>