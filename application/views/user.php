<!--
<ul>
    <?php foreach ($object->result_array() as $row): ?>
        <?php if ($this->session->userdata('id_user') == $row['id_user']): ?>
            <a href="http://pineappme:81/index.php/user/edit/<?php echo $row['id_user']?>"> Редактировать информацию </a>
            <a href="http://pineappme:81/index.php/image/load/"> Загрузить изображение </a>
            <a href="http://pineappme:81/index.php/subscription/getAllNews/"> Показать новости по подпискам </a>
        <?php endif; ?>
        <?php echo form_open('subscription/getAllSubscription/') ?>
            <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
            <input type="submit" value="Подписки">
        </form>
        <?php echo form_open('subscription/getAllSubcribers/') ?>
            <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
            <input type="submit" value="Подписчики">
        </form>
            <a href="http://pineappme:81/index.php/album/getAlbums/<?php echo $row['id_user']?>"> Альбомы </a>
        <li>Страница  : <?php echo $row['id_user']?></li> <br>
        <li>Имя  : <?php echo $row['name']?></li> <br>
        <li>Емайл : <?php echo $row['email']?></li> <br>
        <li>Обо мне : <?php echo $row['about']?></li> <br>
        <li>Город : <?php echo $row['sity']?></li> <br>
        <li>День рожденья : <?php echo $row['birthday']?></li> <br>
        <li><?php echo $row['role']?></li> <br>

    <?php endforeach; ?>
</ul>
-->
<!--
<ul>
    <?php foreach ($images->result_array() as $row): ?>
        <li> id : <?php echo $row['id_image']?></li> <br>
        <li> просмотры :<?php echo $row['views']?></li> <br>
        <li> лайки :<?php echo $row['likes']?></li> <br>
        <li><img src="/../../uploads/<?php echo $row['path']?>"</li> <br>
        <li><?php echo $row['id_album']?></li> <br>
        <?php if ($this->session->userdata('id_user') == $row['id_user']): ?>
            <li>
                <?php echo form_open('image/del/') ?>
                <input type="hidden" name="path" value="<?php echo $row['path']?>">
                <input type="hidden" name="id" value="<?php echo $row['id_image']?>">
                <input type="submit" value="Удалить">
                </form>
            </li> <br>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
-->
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- адаптация под телефоны -->
    <meta name="description" content="Pineappme"> <!-- описание страницы (записывать в content="сюда") -->
    <meta name="keywords" content="Pineappme"> <!-- теги (записывать в content="сюда") -->
    <link rel="stylesheet" href="/../../css/bootstrap.min.css">
    <link rel="stylesheet" href="/../../css/flipclock.css"> <!-- внешний вид таймера -->
    <link rel="stylesheet" href="/../../css/font-awesome.min.css">
    <link rel="stylesheet" href="/../../css/style.css">
    <link rel="stylesheet" href="/../../css/media.css">
    <link rel="stylesheet" href="/../../css/css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-messaging.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic" rel="stylesheet">
    <title>Главная - Pineappme</title> <!-- Название страницы отображаемое в окне браузера сверху -->
</head>

<body class="home_document" onscroll="chekScroll()">
<?php foreach ($object->result_array() as $row): ?>
    <div style="display: none" id="check"> <?php echo $row['id_user'];?> </div>
    <input type="hidden" id="tUser" value="<?php echo $row['id_user'] ?>">
    <header class="header_profile_page">
        <div class="container">
            <div class="photos_profile_page_bg">
                <div class="header_top clearfix">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="top-logo-wrapper">
                                <a href="<?php echo SITE_NAME?>index.php" class="header__logo-link">Iananas</a>
                                <a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubscription/<?php echo $this->session->userdata('id_user') ?>" class="logo__subscribers">подписки</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-6 col-sm-8 col-lg-offset-2">
                                <div class="communication">
                                    <ul class="top_header_menu">
                                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
                                        <li><a href="<?php echo SITE_NAME ?>index.php/Message"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                                        <li>
                                            <a  id="userImage" class="img-a" href="<?php echo SITE_NAME?>index.php/user/home_page/<?php echo $this->session->userdata('id_user') ?>">
                                                <?php if($this->session->userdata('path') != null): ?>
                                                    <img class="img-radius" src="/../../img/mini/<?php echo $this->session->userdata('path') ?>">
                                                <?php endif; ?>
                                                <?php if($this->session->userdata('path') == null):?>
                                                    <img class="img-radius" src="/../../img/add-image-big.jpg">
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="header_content">
                    <div class="profile_wrapper">
                        <div class="row">
                            <div class="col-xs-12 col-md-7">
                                <div class="profile_photos">
                                    <?php if($row['path'] != null) :?>
                                        <img class="large_photo" src="/../../img/mini/<?php echo $row['path'] ?>" alt="Avatar">
                                        <img class="mini_photo" src="/../../img/add-image-big.jpg" alt="Avatar">
                                    <?php endif; ?>
                                    <?php if($row['path'] == null) :?>
                                        <img class="large_photo" src="/../../img/add-image-big.jpg" alt="Avatar">
                                        <img class="mini_photo" src="/../../img/add-image-big.jpg" alt="Avatar">
                                    <?php endif; ?>
                                </div>
                                <div class="profile_name_description_wrap clearfix">
                                    <h2 class="profile_name"><?php echo $row['name']?></h2>
                                    <p class="profile_description"><?php echo $row['about']?></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-5">
                                <ul class="profile_info_right clearfix">
                                    <li><?php echo $row['birthday']?></li>
                                    <li><?php echo $row['sity']?></li>
                                    <li><a href="#"><?php echo $row['email']?></a></li>
                                    <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile_wrapper_2">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <ul class="profile_menu">
                            <li><a href="<?php echo SITE_NAME?>index.php/user/home_page/<?php echo $row['id_user'] ?>">фотографии<br><span><?php foreach($img_count->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                            <li><a href="#">альбомы<br><span><?php foreach($albums->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                            <li><a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubcribers/<?php echo $row['id_user'] ?>">подписчики<br><span><?php foreach($sub_count->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                            <li><a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubscription/<?php echo $row['id_user'] ?>">подписки<br><span><?php foreach($u_sub->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                            <li><a href="#">номинации<br><span>0</span></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <ul class="profile_action clearfix">
                            <?php if($this->session->userdata('id_user') != $row['id_user']) :?>
                                <li id="sub"> <?php echo '<a href="#" onclick="sub('."'".$this->session->userdata('id_user')."'".')"> Подписаться<i class="fa fa-plus" aria-hidden="true"></i></a>'?> </li>
                                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                <li>
                                    <a class="dots" href="#">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
    </header>
    <header class="header_str_photo block-header header-none" id="greenHead">
        <div class="container " >
            <div class="header_top clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="top-logo-wrapper">
                            <a href="<?php echo SITE_NAME?>index.php" class="header__logo-link">iananas</a>
                            <?php if($this->session->userdata('id_user') != null):?>
                                <a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubscription/<?php echo $this->session->userdata('id_user') ?>" class="logo__subscribers">подписки</a>
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
<?php endforeach; ?>
<!--
<section class="images_s">
    <div class="container">
        <div class="row">
            <?php foreach ($images->result_array() as $row): ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="img_item">
                        <img src="/../../img/mini/<?php echo $row['path']?>" alt="Image">
                        <div class="panel clearfix">
                            <div class="date"><?php echo $row['image_data']?></div>
                            <div class="repost"><i class="fa fa-share" aria-hidden="true"></i>5</div>
                            <div class="like"><i class="fa fa-heart" aria-hidden="true"></i><?php echo $row['likes']?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
-->
<section class="images_s">
    <div class="container">
        <div class="row">
            <?php foreach ($images->result_array() as $row): ?>
                <div class="img_item">
                    <img src="/../../img/mini/<?php echo $row['path']?>" alt="Image">
                    <div class="panel clearfix">
                        <div class="date"><?php echo $row['image_data']?></div>
                        <div class="repost"><i class="fa fa-share" aria-hidden="true"></i>0</div>
                        <div class="like"><i class="fa fa-heart" aria-hidden="true"></i><?php echo $row['likes']?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<input type="hidden" id="My-id-user" value="<?php echo $this->session->userdata('id_user') ?>">
<script>


    //Проверяем подписаны ли мы на этого человека. Также нужно будет подумать о проверки подписки на группу людей.
    function Cheked(id_user){
        var sub = document.getElementById('sub');
        if (sub != null){
            var iUser = id_user;
            var tUser = document.getElementById('tUser').value;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (xhttp.readyState==4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                    sub.innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("get", "<?php echo SITE_NAME?>index.php/Subscription/chekSub?id_user="+tUser+"&id_sub="+iUser);
            xhttp.send();
        }
    }

    //Подписываемся на пользователя
    function sub(id_user){
        var sub = document.getElementById('sub');
        if (sub != null) {
            var iUser = id_user;
            var tUser = document.getElementById('tUser').value;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    sub.innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "<?php echo SITE_NAME ?>index.php/subscription/subscribeAjax?id_user="+tUser+"&id_sub="+iUser);
            xhttp.send();
        }
    }

    //Отписываемя от пользователя
    function unsub(id_user){
        var sub = document.getElementById('sub');
        if (sub != null) {
            var iUser = id_user;
            var tUser = document.getElementById('tUser').value;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    sub.innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "<?php echo SITE_NAME ?>index.php/subscription/unsubscribeAjax?id_user="+tUser+"&id_sub="+iUser);
            xhttp.send();
        }
    }

    function chekScroll(){
        var green = document.getElementById('greenHead');
        if(window.pageYOffset >= 500){
            green.setAttribute('class','block-header2');
        }
        if(window.pageYOffset < 500){
            green.setAttribute('class','header-none');
        }
    }

    function getUserImage(id_user){
        var userImage = document.getElementById('userImage');
        var userImageGreen = document.getElementById('userImageGreen');
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200){
                var jsonText = xhttp.responseText;
                var jsonText2 = JSON.parse(jsonText);
                for (key in jsonText) {
                    userImage.innerHTML = "<img class='img-radius' src='/../../img/mini/" + jsonText2['path'] + "' alt='photo'>";
                    userImageGreen.innerHTML = "<img class='img-radius' src='/../../img/mini/" + jsonText2['path'] + "' alt='photo'>";
                }

            }
        };
        xhttp.open("GET", "<?php echo SITE_NAME ?>index.php/image/getImageUser?id_user="+id_user);
        xhttp.send();
    }

    window.onload = function() {
        getUserImage(document.getElementById('My-id-user').value);
        Cheked(document.getElementById('My-id-user').value);
    };

</script>
