<!DOCTYPE html>
    <html lang="en">
        <head>
            <title><?php $title = !empty($title) ? $title : 'Какой-то тайтл'; echo $title?></title>
            <meta charset="UTF-8">
            <script type="text/javascript" src="../../js/jquery-3.1.0.min.js"></script>
            <script type="text/javascript" src="../../js/scripts.js"></script>
        </head>
        <body>
            <?php
            if ($this->input->post('token')){
                //Предположительно проблем с логином не будет в будущем, если только юзер не захочет заходить через емайл и пароль
                //Поменяв затем что-нибудь плохое, возможно стоит запретить менять емайл
                //TODO проверка на уникальность емайла, если такой уже есть, значит аторизуем пользователя, а не создаём нового
                //Хотя в данный момент это как готово
                //TODO генерация случайного пароля
                $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
                $user = json_decode($s, true);
                $id_user = $user['first_name'];
                $name = $user['first_name'];
                $email = $user['email'];
                $newdata = array();
                $sql = "SELECT * FROM users WHERE email = ".(string)$this->db->escape($email);
                if(!$this->db->query($sql)){
                    $sql = "INSERT INTO users (id_user,name,email) VALUES(
                           ".(string)$this->db->escape($id_user).",
                           ".$this->db->escape($name).",
                           ".$this->db->escape($email).")";
                    $query = $this->db->query($sql);
                }
                $sql =  "SELECT * FROM users WHERE email = ".$this->db->escape($email);
                $object = $this->db->query($sql);
                foreach ($object->result_array() as $row) {
                    $newdata['id_user'] = $row['id_user'];
                    $newdata['name'] = $row['name'];
                    $newdata['email'] = $row['email'];
                    $newdata['logged_in'] = TRUE;
                }
                $this->session->set_userdata($newdata);
            }
            ?>
            <?php if ($this->session->userdata('id_user') == null):?>
                <section>
                    <script src="//ulogin.ru/js/ulogin.js"></script>
                    <div id="uLogin" data-ulogin="display=small;theme=classic;fields=first_name,email;providers=facebook,vkontakte,twitter,googleplus;redirect_uri=http%3A%2F%2Fpineappme%3A81%2Findex.php;mobilebuttons=0;"></div>
                    <!--<div id="uLogin" data-ulogin="display=small;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=http%3A%2F%2Fpineappme%3A81%2Findex.php%2Fauth;mobilebuttons=0;"></div>-->
                    <?php echo form_open('user/login/') ?>
                        <?php echo validation_errors(); ?>
                        <label>
                            E-mail: <input type="text" name="email"><br>
                        </label>
                        <label>
                            Пароль: <input type="password" name="password"><br>
                        </label>
                        <input type="submit" value="Войти">
                    </form>
                    <a href="http://pineappme:81/index.php/user/registration"> Зарегестрироваться </a>
                </section>
            <?php endif; ?>
            <br>
            <a href="http://pineappme:81/index.php/image/"> На главную</a>
            <?php if ($this->session->userdata('id_user') != null) :?>
                <!-- Прошлый вариант выхода, теперь используем ссылку, котороя редиректит
                <?php echo form_open('user/logout/') ?>
                    <input type="hidden" >
                    <input type="submit" value="Выйти">
                </form>
                -->
                <a href="http://pineappme:81/index.php/user/logout/1">Выйти</a>
                <br>
                <a href="http://pineappme:81/index.php/user/home_page/<?php echo $this->session->userdata('id_user') ?>">Профиль</a>
                <br>
            <?php endif; ?>
            <br>
            <a href="http://pineappme:81/index.php/image/getPopular"> Просмотреть самое просматриваемое</a>
            <a href="http://pineappme:81/index.php/image/getFavourite">Просмотреть самое понравившееся</a>
            <a href="http://pineappme:81/index.php/user/getAllUsers"> Все пользователи </a>