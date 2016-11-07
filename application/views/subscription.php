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
        <link rel="stylesheet" href="/../../css/css.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="/../../js/scripts.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic" rel="stylesheet">
        <title>Подписчики - Iananas</title> <!-- Название страницы отображаемое в окне браузера сверху -->
    </head>

<body class="profile_document" onscroll="chekScroll()">
    <?php foreach ($object->result_array() as $row): ?>
        <div style="display: none" id=""> <?php echo $row['id_user'] ?> </div>
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
                                <li><a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubcribers/<?php echo $this->session->userdata('id_user') ?>">подписчики<br><span><?php foreach($sub_count->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                                <li><a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubscription/<?php echo $this->session->userdata('id_user') ?>">подписки<br><span><?php foreach($u_sub->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                                <li><a href="#">номинации<br><span>0</span></a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <ul class="profile_action clearfix">
                                <?php if($this->session->userdata('id_user') != $row['id_user']) :?>
                                    <li id="sub"><a onclick="">Отписаться<i class="fa fa-times" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                                <li>
                                    <a class="dots" href="#">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </header>
        <header class="header_str_photo block-header header-none" id="greenHead" style="display: none">
            <div class="container " >
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
    <?php endforeach; ?>

        <section class="subscribers">
            <div class="container">
                <div class="row">
                    <?php foreach($query->result_array() as $rowNot) :?>
                        <div class="col-xs-12 col-sm-4 col-md-4" id="<?php echo $this->session->userdata('id_user').$rowNot['id_user']?>">
                            <div class="sub_item">
                                <div class="sub_avatar">
                                    <?php if($rowNot['path'] != null):?>
                                        <img src="/../../img/mini/<?php echo $rowNot['path']?>" alt="subscribers avatar">
                                    <?php endif; ?>
                                    <?php if($rowNot['path'] == null):?>
                                        <img src="/../../img/add-image-big.jpg" alt="subscribers avatar">
                                    <?php endif; ?>
                                </div>
                                <div class="sub_name"><?php echo $rowNot['name']?></div>
                                <a onclick="unsub(<?php echo "'".$this->session->userdata('id_user')."'".','."'".$rowNot['id_user']."'"?>)" class="sub_button">Отписаться <i class="fa fa-minus" aria-hidden="true"></i></a>
                                <div class="sub_person_info">
                                    <div class="sub_person_photos">фотографии</div>
                                    <div class="sub_person_subs">подписчики</div>
                                    <div class="sub_person_subscription">подписки</div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <script src="/../../js/common.js"></script>
    </body>
</html>

<script>
    window.onload = function (){
        getUserImage('<?php echo $this->session->userdata('id_user') ?>');
        chekScroll();
    };

    function chekScroll(){
        var green = document.getElementById('greenHead');
        if(window.pageYOffset >= 500){
            green.setAttribute('style','display:block');
        }
        if(window.pageYOffset < 500){
            green.setAttribute('style','display:none');
        }
    }

    //Отписываемя от пользователя
    function unsub(id_user, t_user) {
        var rem = document.getElementById(id_user+t_user);
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                console.log(xhttp.responseText);
                rem.remove();
            }
        };
        xhttp.open("GET", "<?php echo SITE_NAME ?>index.php/subscription/unsubscribeAjax?id_user="+t_user+"&id_sub="+id_user);
        xhttp.send();
    }
</script>