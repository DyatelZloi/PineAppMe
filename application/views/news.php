<?php foreach ($images_data->result_array() as $row ): ?>
    <?php echo form_open('image/getById/') ?>
        <input type="hidden" name="id" value="<?php echo $row['id_image']?>">
        <input type="submit" value="Просмотреть оригинал">
    </form>
    <br>
    <p><?php echo $row['id_image']?></p>
    <br>
    <img class="img-thumbnail" src="<?php echo '/../../img/mini/'.$row['path']; ?>">
<?php endforeach; ?>

<ul>
    <?php foreach ($like_data->result_array() as $row): ?>
        <li>
            <?php echo $row['id_like'] ?>
        </li>
        <li>
            <?php echo $row['id_user'] ?>
        </li>
        <li>
            <?php echo $row['like_data'] ?>
        </li>
    <?php endforeach; ?>
</ul>