<?php foreach ($object->result_array() as $row): ?>
    <li><?php echo $row['id_user']?></li> <br>
    <li><?php echo $row['name']?></li> <br>
    <li><?php echo $row['email']?></li> <br>
    <li><?php echo $row['about']?></li> <br>
    <li><?php echo $row['sity']?></li> <br>
    <?php echo form_open('subscription/unsubscribe/')?>
        <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
        <input type="submit" value="Отписаться">
    </form>
<?php endforeach; ?>