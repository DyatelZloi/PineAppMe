<ul>
    <?php foreach ($object->result_array() as $row): ?>
        <?php echo form_open('subscription/getAllSubscription/') ?>
            <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
            <input type="submit" value="Подписки">
        </form>
        <?php echo form_open('subscription/getAllSubcribers/') ?>
            <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
            <input type="submit" value="Подписчики">
        </form>
            <a href="<?php echo SITE_NAME?>index.php/user/home_page/<?php echo $row['id_user']?>">Профиль</a>
            <a href="<?php echo SITE_NAME?>index.php/album/getAlbums/<?php echo $row['id_user']?>"> Альбомы </a>
        <li>Страница : <?php echo $row['id_user']?></li> <br>
        <li>Имя : <?php echo $row['name']?></li> <br>
        <li>Емайл : <?php echo $row['email']?></li> <br>
        <li>Обо мне : <?php echo $row['about']?></li> <br>
        <li>Город : <?php echo $row['sity']?></li> <br>
        <li>День рожденья : <?php echo $row['birthday']?></li> <br>
        <li><?php echo $row['role']?></li> <br>
        <li><?php echo $row['id_image']?></li> <br>
    <?php endforeach; ?>
</ul>