<!--
    <?php foreach ($object->result_array() as $row): ?>
        <li><?php echo $row['id_user']?></li> <br>
        <li><?php echo $row['name']?></li> <br>
        <li><?php echo $row['email']?></li> <br>
        <li><?php echo $row['about']?></li> <br>
        <li><?php echo $row['sity']?></li> <br>
        <?php echo form_open('subscription/unsubscribe/')?>
            <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
            <input type="submit" value="Отписаться">
        </form>
    <?php endforeach; ?>
-->
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic" rel="stylesheet">
    <title>Подписчики - Iananas</title> <!-- Название страницы отображаемое в окне браузера сверху -->
</head>

<body class="profile_document">
<?php foreach ($object->result_array() as $row): ?>
    <header class="header_profile_page">
        <div class="container">
            <div class="photos_profile_page_bg">
                <div class="header_top clearfix">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="top-logo-wrapper">
                                <a href="<?php echo SITE_NAME?>index.php" class="header__logo-link">Iananas</a>
                                <?php if($this->session->userdata('id_user') != null):?>
                                    <a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubcribers/<?php echo $this->session->userdata('id_user') ?>" class="logo__subscribers">подписки</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-6 col-sm-8 col-lg-offset-2">
                            <?php if($this->session->userdata('id_user') == $row['id_user']) :?>
                                <div class="communication">
                                    <ul class="top_header_menu">
                                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                                        <li>
                                            <a href="#"><img class="img-radius" src="/../../img/mini/<?php echo $row['path'] ?>" alt="photo">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
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
                                <li><a href="#">Отписаться<i class="fa fa-times" aria-hidden="true"></i></a></li>
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
<?php endforeach; ?>

<section class="subscribers">
    <div class="container">
        <div class="row">
            <?php foreach($query->result_array() as $rowNot) :?>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="sub_item">
                        <div class="sub_avatar">
                            <img src="img/sub_item_avatar.png" alt="subscribers avatar">
                        </div>
                        <div class="sub_name"><?php echo $rowNot['name']?></div>
                        <a href="<?php echo SITE_NAME ?>index.php/Subscription/subscribe" class="sub_button">Подписаться<i class="fa fa-plus" aria-hidden="true"></i></a>
                        <div class="sub_person_info">
                            <div class="sub_person_photos">фотографии</div>
                            <div class="sub_person_subs">подписчики</div>
                            <div class="sub_person_subscription">подписки</div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script src="js/common.js"></script>
</body>

</html>
