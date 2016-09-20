<!-- Мысль дня:"Каждый может стать богом для себя, либо дьяволом."-->

<?php foreach ($images_data->result_array() as $row): ?>
    <?php echo form_open('image/getById/') ?>
        <input type="hidden"  name="id" value="<?php echo $row['id_image']?>">
        <input type="submit" value="Просмотреть оригинал">
    </form>
    <br>
    <p> id картинки : <?php echo $row['id_image']?></p>
    <p> id пользователя : <?php echo $row['id_user']?></p>
    <img class="img-thumbnail" src="<?php echo '/../../img/mini/'.$row['path']; ?>">
<?php endforeach; ?>

<br>
<br>
<br>

<!--
        praise - похвала
        trash - мусор
        Что-то я ну очень сильно переживаю, вроде всё, что мог отдебажил, но мне страшно. Да и похоже репетиции не будет.
        Что-то шеф опаздывает, это меня напрегает ещё больше.
        Паника! Паника! Паника!
        Паника, а кто говорит о панике? Нет никаких причин для паник. Правда же?
        Будем верить в себя, всё должно пройти хорошо. Они посмотрят и уйдут довольные.
-->