<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <!-- адаптация под телефоны -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- описание страницы (записывать в content="сюда") -->
    <meta name="description" content="Pineappme">
    <!-- теги (записывать в content="сюда") -->
    <meta name="keywords" content="Pineappme">
    <link rel="stylesheet" href="/../../css/bootstrap.min.css">
    <!-- внешний вид таймера -->
    <link rel="stylesheet" href="/../../css/flipclock.css">
    <link rel="stylesheet" href="/../../css/jquery.formstyler.css">
    <link rel="stylesheet" href="/../../css/font-awesome.min.css">
    <link rel="stylesheet" href="/../../css/style.css">
    <link rel="stylesheet" href="/../../css/media.css">
    <link rel="stylesheet" href="/../../css/css.css">

    <script src="/../../js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/../../js/jquery.formstyler.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic" rel="stylesheet">
    <!-- Название страницы отображаемое в окне браузера сверху -->
    <title>Конкурс - Pineappme</title>
</head>

<body class="home_document" onscroll="chekScroll()" onload="getUserImage('<?php echo $this->session->userdata('id_user') ?>')">

<header class="header">
    <div class="container">
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
                    <div class="communication">
                        <input type="text" class="header_search_header" placeholder="Поиск">
                        <?php if($this->session->userdata('id_user') != null):?>
                            <ul class="top_header_menu">
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
                        <?php endif; ?>
                        <?php if($this->session->userdata('id_user') == null):?>
                            <a class="buttons-head-1" href="<?php echo SITE_NAME?>index.php/user/login"> Войти </a>
                            <a class="buttons-head-1" href="<?php echo SITE_NAME?>index.php/user/registration"> Зарегистрироваться </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_content">
            <div class="foto_contest">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>Фотоконкурс</h2>
                        <h1>"Пункт назначения море"</h1>
                    </div>
                </div>
            </div>
            <div class="header_timer clearfix col-xs-12">
                <div class="row">
                    <div>
                        <div class="your-clock"></div>
                    </div>
                </div>
            </div>
            <div class="header_buttons">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?php echo SITE_NAME?>index.php/user/registration">Регистрируйся</a>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <a href="<?php echo SITE_NAME?>index.php/image/load">Загружай фото</a>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <a href="#">Получай призы</a>
                    </div>
                </div>
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


<section class="rules_s">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="rules_text">Правила конкурса</h2>
            </div>
        </div>
        <div class="row">
            <div class="konkurs_rules_items">
                <div class="col-xs-12 col-sm-3">
                    <div class="konkurs_rules_item">
                        <div class="item_circle red_circle"></div>
                        <p class="circle_text">Прояви профессионализм
                            <br> и креатив - сделай крутые
                            <br> фотографии!</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="konkurs_rules_item">
                        <div class="item_circle green_circle"></div>
                        <p class="circle_text">Загружайте свои работы
                            <br>в одной и 6 номинаций
                            <br>
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="konkurs_rules_item">
                        <div class="item_circle blue_circle"></div>
                        <p class="circle_text">Участвуйте в розыгрыше
                            <br>52 подарков от 9 спонсоров</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="konkurs_rules_item">
                        <div class="item_circle yellow_circle"></div>
                        <p class="circle_text">Получай отзывы и советы
                            <br>от экспертного жюри.
                            <br>И ещё что-то крутое</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="nominations">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="nominations_text">Номинации</h2>
                <div class="nominations_items">
                    <a href="#" class="nominations_item">Животное и человек</a>
                    <br>
                    <a href="#" class="nominations_item">Один в кадре</a>
                    <br>
                    <a href="#" class="nominations_item">Принять участие</a>
                    <br>
                    <a href="#" class="nominations_item">Дикое разнообразие</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="prizes_s">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="prizes_head clearfix">
                    <div class="prizes_left_item">
                        <div class="prizes_left_item_25">25</div>
                        <div class="prizes_left_item_nice">крутых
                            <span>призов</span></div>
                    </div>
                    <div class="prizes_right_item">
                        Участвуй в конкурсе и
                        <br>выигрывай ценные призы!
                    </div>
                </div>
            </div>
        </div>
        <div class="prizes_items_img">
            <div class="row">
                <div class="col-xs-12">
                    <div class="prizes_item">
                        <a href="#"><img src="/../../img/prize_gyro.jpg" alt="Гироскутер"></a>
                    </div>
                    <div class="prizes_item">
                        <a href="#"><img src="/../../img/prize_backpack.jpg" alt="Рюкзак"></a>
                    </div>
                    <div class="prizes_item">
                        <a href="#"><img src="/../../img/prize_t-shirt.jpg" alt="Футболка"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="prizes_item">
                        <a href="#"><img src="/../../img/prize_powerbank.jpg" alt="Павер Банк"></a>
                    </div>
                    <div class="prizes_item">
                        <a href="#"><img src="/../../img/prize_bicycle.jpg" alt="Велосипед"></a>
                    </div>
                    <div class="prizes_item">
                        <a href="#"><img src="/../../img/prize_plaid.jpg" alt="Плед"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="prizes_bottom">
                <h2 class="send_photos">Отправяй фотографии</h2>
                <p class="prizes_bottom_descr">Выигрывайте вояж на двоих по Средиземному морю и другие подарки.<br>Больше объявлений - больше шансов!</p>
                <button class="prize_send_photo_button">Отправить фото</button>
            </div>
        </div>
    </div>
</section>

<section class="add_photo_s">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form class="add_photo_form">
                    <h3 class="add_photo_text">Добавь фото</h3>
                    <input class="form_photo_name" type="text" placeholder="Название">
                    <select>
                        <option>Номинация</option>
                        <option>Номинация 2</option>
                        <option>Номинация 3</option>
                        <option>Номинация 4</option>
                        <option>Номинация 5</option>
                    </select>
                    <input class="form_photo_short_descr clearfix" type="text" placeholder="Краткое описание">
                    <input class="form_photo_button" type="submit" value="Загрузить фотографию">
                    <input id="photo_checkbox" type="checkbox" required> <label for="photo_checkbox">Я соглашаюсь с правилами конкурса</label>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="/../../js/flipclock.min.js"></script>
<!-- скрипт таймера -->
<script src="/../../js/common.js"></script>
</body>

</html>
<script>
    function chekScroll(){
        var green = document.getElementById('greenHead');
        console.log(window.pageYOffset);
        if(window.pageYOffset >= 500){
            green.setAttribute('class','block-header2');
        }
        if(window.pageYOffset < 500){
            green.setAttribute('class','header-none');
        }
    }
</script>
