<?php echo form_open_multipart('image/do_upload/') ?>
    <p> Выберите альбом : </p>
    <select name="id_album">
        <option></option>
        <?php foreach ($albums->result_array() as $row): ?>
            <option  value="<?php echo $row['id_album'] ?>"><?php echo $row['name'] ?></option>
        <?php endforeach ?>
    </select>
    <br>
    <br>
    <?php echo $error;?>
    <input type="file" name="userfile" size="20" />
    <br /><br />
    <input type="submit" value="upload" />
</form>
