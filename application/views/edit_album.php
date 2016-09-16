<?php echo form_open_multipart('album/do_edit_album/') ?>
    <?php foreach ($album_data->result_array() as $row):?>
            <input type="hidden" name="id_album" value="<?php echo $row['id_album'] ?>">
            <label>
                <p> Название альбома </p><input type="text" name="name" value="<?php echo $row['name']?>">
            </label>
            <br>
            <label>
                <p> Описание альбома</p><input type="text" name="about" value="<?php echo $row['about']?>">
            </label>
            <br>
            <br>
            <label>
                <input type="file" name="userfile" size="20" />
            </label>
            <br>
            <br>
            <input type="submit" value="Создать">
    <?php endforeach; ?>
</form>
