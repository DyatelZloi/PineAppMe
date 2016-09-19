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
            <a href="http://pineappme:81/index.php/user/home_page/<?php echo $row['id_user']?>">Профиль</a>
            <a href="http://pineappme:81/index.php/album/getAlbums/<?php echo $row['id_user']?>"> Альбомы </a>
        <li><?php echo $row['id_user']?></li> <br>
        <li><?php echo $row['name']?></li> <br>
        <li><?php echo $row['email']?></li> <br>
        <li><?php echo $row['about']?></li> <br>
        <li><?php echo $row['sity']?></li> <br>
        <li><?php echo $row['birthday']?></li> <br>
        <li><?php echo $row['role']?></li> <br>
        <li><?php echo $row['img']?></li> <br>
    <?php endforeach; ?>
</ul>