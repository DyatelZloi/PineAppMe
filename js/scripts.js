//it's work!
//Ставим лайк
/*
 //можно скрыть элемент, а можно просто его удалить
 //МОжно просто сделать проверку в пхп, а с помощью аджакса получать и убирать список...
 //
 if (document.readyState === "complete") {
 // то выполняем нашу функцию немедленно
 chekLike();
 } else {
 // иначе - назначаем функцию в качестве обработчика для события загрузки документа
 window.onload = chekLike();
 }

 function chekLike(){
 var idUser = document.getElementById('id_user').value;
 var chek = document.getElementById(idUser).value;
 var body = document.getElementById('LikeAndDislike');
 var like = document.getElementById('likeajax');
 var deleteD = document.getElementById('invinceble');
 var inputDel = null;
 if(chek != null){
 document.getElementById('likeajax').remove();
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

 function createLike(){
 var body = document.getElementById('LikeAndDislike');
 document.getElementById('dislikeAjax').remove();
 var inputDel = document.createElement("div");
 inputDel.innerHTML = '<input id="likeAjax" type="button" value="Лайк AJAX" onclick="likeImage()">';
 body.appendChild(inputDel);
 }

 function createDislike(){
 var body = document.getElementById('LikeAndDislike');
 document.getElementById('likeAjax').remove();
 var inputDel = document.createElement("div");
 inputDel.innerHTML = '<input id="dislikeAjax" type="button" value="Дизлайк AJAX" onclick="dislikeImage()">';
 body.appendChild(inputDel);
 }

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

//Подписываемся на человека
function subscribeAjax(){
    var x = document.getElementById('id_image').value;
    var y = document.getElementById('id_user').value;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200)
            document.getElementById("ajax").innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "http://pineappme:81/index.php/Subscription/subAjax?id_sub="+x+"&id_user="+y, true);
    xhttp.send();
}

//Отписываемся от человека
function unsubscribeAjax(){
    var x = document.getElementById('id_image').value;
    var y = document.getElementById('id_user').value;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200)
            document.getElementById("ajax").innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "http://pineappme:81/index.php/Subscription/unsubAjax?id_sub="+x+"&id_user="+y, true);
    xhttp.send();
}

//Тут люди работают, а ты фигней страдаешь.
