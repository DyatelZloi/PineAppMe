<ul>
    <?php foreach ($albums->result_array() as $row): ?>
        <?php if ($row['id_album'] != null): ?>
        <li><?php echo $row['id_album']?></li> <br>
        <li><?php echo $row['name']?></li> <br>
        <li><?php echo $row['about']?></li> <br>
        <li><?php echo $row['id_user']?></li> <br>
        <li><img src = "<?php echo '/../../img/mini/'.$row['сover']?>"></li> <br>
            <?php if ($this->session->userdata('id_user') == $row['id_user']): ?>
                <?php echo form_open('album/delAlbumById/') ?>
                    <input type="hidden" name="id_album" value="<?php echo $row['id_album']?>">
                    <input type="submit" value="Удалить">
                </form>
                <?php echo form_open('album/editAlbum/') ?>
                    <input type="hidden" name="id_album" value="<?php echo $row['id_album']?>">
                    <input type="submit" value="Редактировать">
                </form>
                <a href="http://pineappme:81/index.php/Album/getImagesFromAlbum/<?php echo $row['id_album']?>">Посмотреть альбом</a>
            <?php endif; ?>
        <br>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<?php if ($this->session->userdata('id_user') == $row['id_user']): ?>
    <ul>
        <li> <a href="http://pineappme:81/index.php/Album/newAlbum/"> Создать новый альбом </a> </li>
    </ul>
<?php endif ?>

