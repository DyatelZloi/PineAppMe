<?php foreach ($images_data->result_array() as $row): ?>
    <?php echo form_open('image/getById/') ?>
        <input type="hidden" name="id" value="<?php echo $row['id_image']?>">
        <input type="submit" value="Просмотреть оригинал">
    </form>
    <br>
    <p><?php echo $row['id_image']?></p>
    <br>
    <img class="img-thumbnail" src="<?php echo '/../../img/mini/'.$row['path']; ?>">
<?php endforeach; ?>