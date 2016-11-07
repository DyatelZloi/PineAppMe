<header class="header">
    <div class="container">
        <div class="header_top clearfix">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="top-logo-wrapper">
                        <a href="<?php echo SITE_NAME?>index.php" class="header__logo-link">Iananas</a>
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
                        <a href="<?php echo SITE_NAME?>index.php/prizeDrawing">Получай призы</a>
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
<section class="photos">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="wrapper">
                    <div class="tabs">
                        <!--
                            Тут мы встаём перед выбором либо загружать всё, либо делать это ссылками. Правда второй вариант может не понравится
                            нашим клиентам, так что делать придётся на свой страх и риск. Не забывай, что ещё нужно будет реализовать динамическую
                            подгрузку картинок
                        -->
                        <span class="tab">Новые фотографии</span>
                        <span class="tab">Популярные</span>
                        <span class="tab">Интересные</span>
                        <span class="tab">Конкурс</span>
                        <span class="tab">Люди</span>
                    </div>
                </div>
                <div class="tab_content">
                    <div class="tab_item">
                        <?php foreach ($images_data->result_array() as $row): ?>
                            <a href="<?php echo SITE_NAME?>index.php/Image/getById/<?php echo $row['id_image']?>" ><img src="<?php echo '/../../img/mini/'.$row['path']; ?>" alt="Image"></a>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab_item">
                        <?php foreach ($images_data2->result_array() as $row): ?>
                            <a href="<?php echo SITE_NAME?>index.php/Image/getById/<?php echo $row['id_image']?>" ><img src="<?php echo '/../../img/mini/'.$row['path']; ?>" alt="Image"></a>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab_item">
                        <?php foreach ($images_data3->result_array() as $row): ?>
                            <a href="<?php echo SITE_NAME?>index.php/Image/getById/<?php echo $row['id_image']?>" ><img src="<?php echo '/../../img/mini/'.$row['path']; ?>" alt="Image"></a>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab_item">

                    </div>
                    <div class="tab_item">
                        <?php foreach($object->result_array() as $rowNot) :?>
                            <div class="col-xs-12 col-sm-4 col-md-4 ">
                                <div class="sub_item margin-bot">
                                    <div class="sub_avatar">
                                        <?php if($rowNot['path'] != null) :?>
                                            <img src="/../../img/mini/<?php echo $rowNot['path']?>" alt="subscribers avatar">
                                        <?php endif; ?>
                                        <?php if ($rowNot['path'] == null):?>
                                            <img src="/../../img/add-image-big.jpg">
                                        <?php endif; ?>
                                    </div>
                                    <div class="sub_name"><?php echo $rowNot['name']?></div>
                                    <a href="<?php echo SITE_NAME ?>index.php/User/home_page/<?php echo $rowNot['id_user']?>" class="sub_button">Просмотреть профиль</a>
                                </div>
                                <br><br>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function chekScroll(){
        var green = document.getElementById('greenHead');
        if(window.pageYOffset >= 500){
            green.setAttribute('class','block-header2');
        }
        if(window.pageYOffset < 500){
            green.setAttribute('class','header-none');
        }
    }
</script>

