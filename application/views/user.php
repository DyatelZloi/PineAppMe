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
<?php foreach ($object->result_array() as $row): ?>
    <header class="header_profile_page">
        <div class="container">
            <div class="photos_profile_page_bg">
                <div class="header_top clearfix">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="top-logo-wrapper">
                                <a href="http://pineappme:81/index.php" class="header__logo-link">Pineappme</a>
                                <a href="#" class="logo__subscribers">подписки</a>
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
                                    <img class="large_photo" src="/../../img/mini/<?php echo $row['path'] ?>" alt="Avatar">
                                    <img class="mini_photo" src="img/profile_photo_2.jpg" alt="Avatar">
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
                            <li><a href="#">фотографии<br><span>48</span></a></li>
                            <li><a href="#">альбомы<br><span>2</span></a></li>
                            <li><a href="http://pineappme:81/index.php/subscription/getAllSubcribers/<?php echo $row['id_user'] ?>">подписчики<br><span>240</span></a></li>
                            <li><a href="#">подписки<br><span>12</span></a></li>
                            <li><a href="#">номинации<br><span>1</span></a></li>
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
<script src="js/common.js"></script>

