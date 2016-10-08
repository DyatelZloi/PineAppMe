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

function getUserImage(id_user){
    console.log(id_user);
    var userImage = document.getElementById('userImage');
    var userImageGreen = document.getElementById('userImageGreen');
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200){
            var jsonText = xhttp.responseText;
            console.log(jsonText);
            var jsonText2 = JSON.parse(jsonText);
            for (key in jsonText) {
                    userImage.innerHTML = "<img class='img-radius' src='/../../img/mini/" + jsonText2['path'] + "' alt='photo'>";
                    userImageGreen.innerHTML = "<img class='img-radius' src='/../../img/mini/" + jsonText2['path'] + "' alt='photo'>";

            }
        }
    };
    xhttp.open("GET", "http://pineappme:81/index.php/image/getImageUser?id_user="+id_user);
    xhttp.send();
}

function getUserImage2(id_user){
    console.log(id_user);
    var userImage = document.getElementById('userImage');
    var userImageGreen = document.getElementById('userImageGreen');
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200){
            var jsonText = xhttp.responseText;
            console.log(jsonText);
            var jsonText2 = JSON.parse(jsonText);
            for (key in jsonText) {
                userImageGreen.innerHTML = "<img class='img-radius' src='/../../img/mini/" + jsonText2['path'] + "' alt='photo'>";

            }
        }
    };
    xhttp.open("GET", "http://pineappme:81/index.php/image/getImageUser?id_user="+id_user);
    xhttp.send();
}