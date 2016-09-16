<?php foreach ($images_data->result_array() as $row): ?>
    <p><?php echo $row['id_image']?></p>
    <br>
    <img class="img-thumbnail" src="<?php echo '/../../uploads/'.$row['path']; ?>">
    <br>
    <?php echo form_open('image/like/') ?>
        <input id="id_image" type="hidden" name="id_image" value="<?php echo $row['id_image']?>">
        <input id="id_user" type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
        <input type="submit" value="Лайк">
    </form>
    <br>
    <?php echo form_open('subscription/subscribe/') ?>
        <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
        <input type="submit" value="Subscribe">
    </form>
    <br>
    <?php echo form_open('image/del/') ?>
        <input type="hidden" name="path" value="<?php echo $row['path']?>">
        <input type="hidden" name="id" value="<?php echo $row['id_image']?>">
        <input type="submit" value="Удалить">
    </form>
    <div id="LikeAndDislike">
        <input id="likeAjax" type="button" value="Лайк AJAX" onclick="likeImage()">
    </div>
<?php endforeach; ?>
<ul id="delete">
    <?php foreach ($like_data->result_array() as $row): ?>
        <li id = "<?php echo $row['id_user']?>" value="<?php echo $row['id_user']?>"><?php echo $row['id_user']?></li>
    <?php endforeach; ?>
</ul>

<script type='text/javascript'>

    if (document.readyState === "complete") {
        chekLike();
    } else {
        window.onload = chekLike();
    }

    // Проверяем наличие лайков
    function chekLike(){
        var idUser = document.getElementById('id_user').value;
        var chek = document.getElementById(idUser);
        var body = document.getElementById('LikeAndDislike');
        var like = document.getElementById('likeajax');
        var deleteD = document.getElementById('invinceble');
        var inputDel = null;
        if(chek != null){
            document.getElementById('likeAjax').remove();
            inputDel = document.createElement("div");
            inputDel.innerHTML = '<input id="dislikeAjax" type="button" value="Дизлайк AJAX" onclick="dislikeImage()">';
            body.appendChild(inputDel);
        } else {
            document.getElementById('dislikeAjax').remove();
            inputDel = document.createElement("div");
            inputDel.innerHTML = '<input id="likeAjax" type="button" value="Лайк AJAX" onclick="likeImage()">';
            body.appendChild(inputDel);
        }
    };

    //Создаём лайк
    function createLike(){
        var body = document.getElementById('LikeAndDislike');
        document.getElementById('dislikeAjax').remove();
        var inputDel = document.createElement("div");
        inputDel.innerHTML = '<input id="likeAjax" type="button" value="Лайк AJAX" onclick="likeImage()">';
        body.appendChild(inputDel);
    }

    //Создаём дизлайк
    function createDislike(){
        var body = document.getElementById('LikeAndDislike');
        document.getElementById('likeAjax').remove();
        var inputDel = document.createElement("div");
        inputDel.innerHTML = '<input id="dislikeAjax" type="button" value="Дизлайк AJAX" onclick="dislikeImage()">';
        body.appendChild(inputDel);
    }

    //Лайки уходят с нами
    function dislikeImage(){
        var x = document.getElementById('id_image').value;
        var y = document.getElementById('id_user').value;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("ajax").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "http://pineappme:81/index.php/image/dislikeajax?id_image="+x+"&id_user="+y, true);
        xhttp.send();
        createLike();
    };

    //Лайкаем понравившуюся картинку
    function likeImage() {
        var x = document.getElementById('id_image').value;
        var y = document.getElementById('id_user').value;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("ajax").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "http://pineappme:81/index.php/image/likeajax?id_image="+x+"&id_user="+y, true);
        xhttp.send();
        createDislike();
    };

    //Проверяем подписку
    function chekSubscribe(){

    }

    //Подписываемся
    function subscribe(){

    }

    //Отписываемся
    function unsubscribe(){

    }
</script>

