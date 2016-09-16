<?php echo form_open_multipart('album/newAlbum/') ?>
    <label>
        <p> Название альбома </p><input type="text" name="name">
    </label>
    <br>
    <label>
        <p> Описание альбома</p><input type="text" name="about">
    </label>
    <br>
    <br>
    <label>
        <input type="file" name="userfile" size="20" />
    </label>
    <br>
    <br>
    <input type="submit" value="Создать">
</form>