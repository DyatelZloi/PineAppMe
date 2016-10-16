<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- адаптация под телефоны -->
        <meta name="description" content="Pineappme"> <!-- описание страницы (записывать в content="сюда") -->
        <meta name="keywords" content="Pineappme"> <!-- теги (записывать в content="сюда") -->
        <link rel="stylesheet" href="/../../css/bootstrap.min.css">
        <link rel="stylesheet" href="/../../css/font-awesome.min.css">
        <link rel="stylesheet" href="/../../css/style.css">
        <link rel="stylesheet" href="/../../css/media.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="/../../js/scripts.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="/../../css/css.css">
        <title>Страница     Фотографий - Iananas</title> <!-- Название страницы отображаемое в окне браузера сверху -->
    </head>
    <body class="str_body" onload="getUserImage2('<?php echo $this->session->userdata('id_user') ?>')">
        <header class="header_str_photo block-header">
            <div class="container">
                <div class="header_top clearfix">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="top-logo-wrapper">
                                <a href="<?php echo SITE_NAME?>index.php" class="header__logo-link">iananas</a>
                                <?php if($this->session->userdata('id_user') != null):?>
                                    <a href="#" class="logo__subscribers">подписки</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-6 col-sm-8 col-lg-offset-2">
                            <div class="communication">
                                <input type="text" class="header_search_header" placeholder="Поиск">
                                <?php if($this->session->userdata('id_user') != null):?>
                                    <ul class="top_header_menu">
                                        <li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                                        <li>
                                            <a id="userImageGreen" class="img-a" href="<?php echo SITE_NAME?>index.php/user/home_page/<?php echo $this->session->userdata('id_user') ?>">
                                                <img class="img-radius" src="/../../img/mini/<?php echo $this->session->userdata('path') ?>">
                                            </a>
                                        </li>
                                    </ul>
                                <?php endif; ?>
                                <?php if($this->session->userdata('id_user') == null):?>
                                    <a class="buttons-head-1" href="<?php echo SITE_NAME?>index.php/user/login"> Войти </a>
                                    <a class="buttons-head-1" href="<?php echo SITE_NAME?>index.php/user/registration"> Зарегистрироваться </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="str_photos">
            <div class="container">
                <?php foreach ($images_data->result_array() as $row): ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="photo_and_buttons clearfix">

                                <a onclick="previousImage()" class="str_photo_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>

                                <div class="main_str_photo" id="main" >
                                    <input type="hidden" id="id_image" value="<?php echo $row['id_image'] ?>">
                                    <img height="520px" src="<?php echo '/../../uploads/'.$row['path']; ?>" alt="photo">
                                </div>
                                <a class="str_photo_next" onclick="nextImage()"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <div class="crest_and_fullpage">
                                    <a class="crest_button" href="#"><img src="/../../img/str_photo_crest.png" alt="crest"></a>
                                    <a class="fullpage_button" href="#"><img src="/../../img/str_photo_fullpage.png" alt="full page"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="photo_mini_items clearfix">
                            <?php foreach ($images_data->result_array() as $row): ?>
                                <li class="photo_item" id="<?php echo $row['id_image'] ?>">
                                    <a onclick="activeImage('<?php echo $row['id_image'] ?>','<?php echo $row['path'] ?>')">
                                        <img src="/../../img/mini/<?php echo $row['path']?>" alt="mini photo">
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <?php foreach ($img_data->result_array() as $notRow): ?>
                                <li class="photo_item" id="<?php echo $notRow['id_image'] ?>">
                                    <a onclick="activeImage('<?php echo $notRow['id_image'] ?>','<?php echo $notRow['path'] ?>')">
                                        <img src="/../../img/mini/<?php echo $notRow['path']?>" alt="mini photo">
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <script src="../../js/common.js"></script>

    </body>

</html>

<script type='text/javascript'>

    if (document.readyState === "complete") {
        chekLike();
    } else {
        window.onload = chekLike();
    }

    // Проверяем наличие лайков
    function chekLike(){
        var idUser = document.getElementById('id_user').value;
        var chek = document.getElementById(idUser);
        var body = document.getElementById('LikeAndDislike');
        var like = document.getElementById('likeajax');
        var deleteD = document.getElementById('invinceble');
        var inputDel = null;
        if(chek != null){
            document.getElementById('likeAjax').remove();
            inputDel = document.createElement("div");
            inputDel.innerHTML = '<input id="dislikeAjax" type="button" value="Дизлайк AJAX" onclick="dislikeImage()">';
            body.appendChild(inputDel);
        } else {
            document.getElementById('dislikeAjax').remove();
            inputDel = document.createElement("div");
            inputDel.innerHTML = '<input id="likeAjax" type="button" value="Лайк AJAX" onclick="likeImage()">';
            body.appendChild(inputDel);
        }
    }

    //Проверяем наличие подписки
    function chekSubscribe(){
        var idUser = document.getElementById('id_user').value;
        var chek = document.getElementById(idUser);
        var body = document.getElementById('SubscribeAndUnsubscribe');
        var inputDel = null;
        if( chek != null ){
            document.getElementById('SubscribeAjax').remove();
            inputDel = document.createElement('div');
            inputDel.innerHTML = '<input id="UnsubscribeAjax" type="button" value="Отписаться" onclick="UnsubscribeAjax()">';
            body.appendChild(inputDel);
        } else {
            document.getElementById('UnsubscribeAjax').remove();
            inputDel = document.createElement('div');
            inputDel.innerHTML = '<input id="SubscribeAjax" type="button" value="Подписаться" onclick="SubscribeAjax()">';
            body.appendChild(inputDel);
        }
    }

    //Создаём лайк
    function createLike(){
        var body = document.getElementById('LikeAndDislike');
        document.getElementById('dislikeAjax').remove();
        var inputDel = document.createElement("div");
        inputDel.innerHTML = '<input id="likeAjax" type="button" value="Лайк AJAX" onclick="likeImage()">';
        body.appendChild(inputDel);
    }

    //Создаём дизлайк
    function createDislike(){
        var body = document.getElementById('LikeAndDislike');
        document.getElementById('likeAjax').remove();
        var inputDel = document.createElement("div");
        inputDel.innerHTML = '<input id="dislikeAjax" type="button" value="Дизлайк AJAX" onclick="dislikeImage()">';
        body.appendChild(inputDel);
    }

    //Лайки уходят с нами
    function dislikeImage(){
        var x = document.getElementById('id_image').value;
        var y = document.getElementById('id_user').value;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("ajax").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "<?php echo SITE_NAME?>index.php/image/dislikeajax?id_image="+x+"&id_user="+y, true);
        xhttp.send();
        createLike();
    }

    //Лайкаем понравившуюся картинку
    function likeImage() {
        var x = document.getElementById('id_image').value;
        var y = document.getElementById('id_user').value;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("ajax").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "<?php echo SITE_NAME?>index.php/image/likeajax?id_image="+x+"&id_user="+y, true);
        xhttp.send();
        createDislike();
    }

    //Отписаться
    function UnsubscribeAjax(){
        var x = document.getElementById('id_v_user').value;
        var y = document.getElementById('id_user').value;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("ajax").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "<?php echo SITE_NAME?>index.php/image/unsubscribeAjax?id_v_user="+x+"&id_user="+y, true);
        xhttp.send();
        createSubscribe();
    }

    //Подписаться
    function SubscribeAjax(){
        var x = document.getElementById('id_v_user').value;
        var y = document.getElementById('id_user').value;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("ajax").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "<?php echo SITE_NAME?>index.php/image/subscribeAjax?id_v_user="+x+"&id_user="+y, true);
        xhttp.send();
        createUnsubscribe();
    }

    //Создаём кнопку подписки
    function createSubscribe(){
        var body = document.getElementById('SubscribeAndUnsubscribe');
        document.getElementById('UnsubscribeAjax').remove();
        var inputDel = document.createElement("div");
        inputDel.innerHTML = '<input id="subscribe" type="button" value="Подписаться" onclick="SubscribeAjax()">';
        body.appendChild(inputDel);
    }

    //Создаём кнопку отписки
    function createUnsubscribe(){
        var body = document.getElementById('SubscribeAndUnsubscribe');
        document.getElementById('SubscribeAjax').remove();
        var inputDel = document.createElement("div");
        inputDel.innerHTML = '<input id="unsubscribe" type="button" value="Отписаться" onclick="UnsubscribeAjax()">';
        body.appendChild(inputDel);
    }

    //Нужно как-то убирать последнюю и добовлять в
    //Следующая страница
    function nextImage(){
        var idImage = parseInt(document.getElementById('id_image').value);
        var activeImage = document.getElementById(idImage);
        console.log('Активная картинка - '+ idImage);
        var idUser = document.getElementById('main');
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.status == 200) {
                var jsonText = JSON.parse(xhttp.responseText);
                for (key in jsonText) {
                    idUser.innerHTML = "<input type='hidden' id='id_image' value='"+jsonText['id_image']+"'> <img height='520px' src='/../../uploads/"+jsonText['path']+"' alt='photo'>"

                }
            }
        }
        xhttp.open("GET", "<?php echo SITE_NAME?>index.php/image/getNextByIdAjax/"+idImage);
        xhttp.send();
    }

    //Преддыдущая страница
    function previousImage(){
        var idImage = parseInt(document.getElementById('id_image').value);
        var activeImage = document.getElementById(idImage);
        console.log('Активная картинка - '+ activeImage);
        var idUser = document.getElementById('main');
        console.log(idImage);
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.status == 200) {
                var jsonText = JSON.parse(xhttp.responseText);
                for (key in jsonText) {
                    idUser.innerHTML = "<input type='hidden' id='id_image' value='"+jsonText['id_image']+"'> <img height='520px' src='/../../uploads/"+jsonText['path']+"' alt='photo'>"
                }
            }
        }
        xhttp.open("GET", "<?php echo SITE_NAME?>index.php/image/getPrevByIdAjax/"+idImage);
        xhttp.send();
    }

    //TODO установка высоты картинки - только временная мера, нужно будет переделать.
    //Активировать страницу
    function activeImage(id_img, path){
        var idUser = document.getElementById('main');
        idUser.innerHTML ="<input type='hidden' id='id_image' value='"+id_img+"'> <img height='520px' src='/../../uploads/"+path+"' alt='photo'>"
    }

    //Получить все сообщения
    function getAllMessages(){
        var text;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState==4 && xhttp.status==200){
                var jsonText = JSON.parse(xhttp.responseText);
                var jsonText2;
                for (key in jsonText) {
                    if (jsonText.hasOwnProperty(key)) {
                        console.log("Ключ = " + key);
                        console.log("Значение = " + jsonText[key]);
                        jsonText2 = jsonText[key];
                        for (key in jsonText2) {
                            if (jsonText2.hasOwnProperty(key)) {
                                console.log("Ключ = " + key);
                                console.log("Значение = " + jsonText2[key]);
                            }
                        }
                    }
                }
            }
        };
        xhttp.open("GET", "<?php echo SITE_NAME?>index.php/message/getAllMessage");
        xhttp.send();
    }

</script>

