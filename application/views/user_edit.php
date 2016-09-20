<section>
        <?php foreach($data->result_array() as $row): ?>
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('user/edit/') ?>
            <label>
                Айди
                <input type="text" name="id_user" value="<?php $id_user = set_value('id_user');echo $id_user = !empty($id_user) ? $id_user : $row['id_user']; ?>"><br>
            </label>
            <br>
            <label>
                Имя
                <input type="text" name="name" value="<?php $name = set_value('name'); echo $name = !empty($name) ? $name : $row['name'];  ?>"><br>
            </label>
            <br>
            <label>
                email
                <input type="email" name="email" value="<?php $email =  set_value('email'); echo $email = !empty($email) ? $email : $row['email'];?>"><br>
            </label>
            <br>
            <label>
                пароль
                <input type="password" name="password" value="<?php $password = set_value('password'); echo $password = !empty($password) ? $password : $row['password'] ?>"><br>
            </label>
            <br>
            <label>
                Обо мне:
                <input type="text" name="about" value="<?php $about = set_value('about'); echo $about = !empty($about) ? $about : $row['about'] ?>"><br>
            </label>
            <br>
            <label>
                День рожденья
                <input type="date" name="birthday" value="<?php $data = set_value('birthday'); echo $data = !empty($data) ? $data : $row['birthday'] ?>"><br>
            </label>
            <!--
                <label>
                    Загрузить картинку
                    <input type="file" name="userfile" size="20" /><br>
                </label>
                <br>
            -->
        <?php endforeach ?>
        <input type="submit" value="Отправить">
        </form>
</section>