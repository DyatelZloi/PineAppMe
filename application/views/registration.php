<section>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('user/registration/') ?>
        <label>
            Айди
            <input type="text" name="id_user" value="<?php echo set_value('id_user'); ?>"><br>
        </label>
        <br>
        <label>
            Имя
            <input type="text" name="name" value="<?php echo set_value('name'); ?>"><br>
        </label>
        <br>
        <label>
            email
            <input type="email" name="email" value="<?php echo set_value('email'); ?>"><br>
        </label>
        <br>
        <label>
            пароль
            <input type="password" name="password" value="<?php echo set_value('password'); ?>"><br>
        </label>
        <br>
    <!--
        <label>
            Загрузить картинку
            <input type="file" name="userfile" size="20" /><br>
        </label>
        <br>
    -->
        <input type="submit" value="Отправить">
    </form>
</section>