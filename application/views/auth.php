<?php
$ses = $this->session->all_userdata();
foreach($ses as $data){
    echo "$data".'<br>';
}
?>
<?php echo validation_errors(); ?>
<section>
    <script src="//ulogin.ru/js/ulogin.js"></script>
    <div id="uLogin" data-ulogin="display=small;theme=classic;fields=first_name,email;providers=facebook,vkontakte,twitter,googleplus;redirect_uri=http%3A%2F%2Fpineappme%3A81%2Findex.php%2Fuser%2FloginFromULogin;mobilebuttons=0;"></div>
    <?php echo form_open('user/login/') ?>
        <label>
            E-mail: <input type="text" name="email"><br>
        </label>
        <label>
            Пароль: <input type="password" name="password"><br>
        </label>
        <input type="submit" value="Войти">
    </form>
</section>
<br>
<a href="<?php echo SITE_NAME?>index.php/image/"> На главную</a>
<br>
<?php echo form_open('user/logout/') ?>
<input type="submit" value="Выйти">
</form>