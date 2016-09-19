<?php echo form_open_multipart('image/do_upload/') ?>
    <p> Выберите альбом : </p>
    <input type="radio" name="album" onclick="radiobuttonclick(0)"> Без альбома <Br>


        <?php foreach ($albums->result_array() as $row): ?>
            <input type="radio" name="album" onclick="radiobuttonclick(<?php echo $row['id_album'] ?>)"> <?php echo $row['name'] ?><Br>
        <?php endforeach ?>

    <br>
    <br>
    <?php echo $error;?>
    <input type="hidden" value="0" name="id_album" id="id_album">
    <input type="file" name="userfile" size="20" />
    <br /><br />
    <input type="submit" value="upload" />
</form>
<script>
    function radiobuttonclick(a){
        var idAlbum = document.getElementById('album');
        var hiddennAlbum = document.getElementById('id_album');
        hiddennAlbum.setAttribute('value', parseInt(a));
    }
</script>