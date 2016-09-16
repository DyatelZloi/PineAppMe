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
<ul>
    <?php foreach ($images->result_array() as $row): ?>
        <li><?php echo $row['id_image']?></li> <br>
        <li><?php echo $row['views']?></li> <br>
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


