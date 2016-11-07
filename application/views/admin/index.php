<!--
    Тут выводим все возможности админа и скорей всего производим вхо & $this->session->userdata('name_role') != nullд/выход.
-->
<?php if($this->session->userdata('admin') != null | $this->session->userdata('name_role') != 'standart' & $this->session->userdata('name_role') != null) :?>
    <div class="padding-divs">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/getAllSection">Разделы</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/getAllCategory">Категории</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/getAllSubcategory">Подкатегории</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/getAllCountry">Страны</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/getAllRegion">Регионы</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/getAllCity">Города</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/getCurrency">Валюты</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/getSliders">Слайды</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/getCompanies">Компании</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/User/getAllUsers">Пользователи</a>
                </li>
                <li>
                    <a href="<?php echo SITE_NAME ?>index.php/AdminPanel/logoutAdmin"> Выйти </a>
                </li>
            </ul>
        </nav>
    </div>

<?php endif; ?>
<?php if($this->session->userdata('admin') == null) : ?>
    <!--
        Форма входа и кнопочка выхода.
    -->
    <div class="padding-divs">
        <?php echo form_open('AdminPanel/loginAdmin', array('class' => "form-horizontal")) ?>
        <p> Логин админа 123</p>
        <input type="text" name="nickname">
        <p> Пароль админа 123</p>
        <input type="password" name="password">
        <br><br>
        <input type="submit" value="Войти">
        </form>
    </div>
<?php endif; ?>