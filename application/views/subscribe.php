<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- адаптация под телефоны -->
    <meta name="description" content="Pineappme"> <!-- описание страницы (записывать в content="сюда") -->
    <meta name="keywords" content="Pineappme"> <!-- теги (записывать в content="сюда") -->
    <link rel="stylesheet" href="/../../css/bootstrap.min.css">
    <link rel="stylesheet" href="/../../css/font-awesome.min.css">
    <link rel="stylesheet" href="/../../css/style.css">
    <link rel="stylesheet" href="/../../css/media.css">
    <link rel="stylesheet" href="/../../css/css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/../../js/scripts.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic" rel="stylesheet">
    <title>Подписчики - Iananas</title> <!-- Название страницы отображаемое в окне браузера сверху -->
</head>

<body class="profile_document" onscroll="chekScroll()">
<?php foreach ($object->result_array() as $row): ?>
    <div style="display: none" id=""> <?php echo $row['id_user'] ?> </div>
    <input type="hidden" id="tUser" value="<?php echo $row['id_user'] ?>">
    <header class="header_profile_page">
        <div class="container">
            <div class="photos_profile_page_bg">
                <div class="header_top clearfix">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="top-logo-wrapper">
                                <a href="<?php echo SITE_NAME?>index.php" class="header__logo-link">Iananas</a>
                                <a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubscription/<?php echo $this->session->userdata('id_user') ?>" class="logo__subscribers">подписки</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-6 col-sm-8 col-lg-offset-2">
                                <div class="communication">
                                    <ul class="top_header_menu">
                                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
                                        <li><a href="<?php echo SITE_NAME ?>index.php/Message"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                                        <li>
                                            <a  id="userImage" class="img-a" href="<?php echo SITE_NAME?>index.php/user/home_page/<?php echo $this->session->userdata('id_user') ?>">
                                                <?php if($this->session->userdata('path') != null): ?>
                                                    <img class="img-radius" src="/../../img/mini/<?php echo $this->session->userdata('path') ?>">
                                                <?php endif; ?>
                                                <?php if($this->session->userdata('path') == null):?>
                                                    <img class="img-radius" src="/../../img/add-image-big.jpg">
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="header_content">
                    <div class="profile_wrapper">
                        <div class="row">
                            <div class="col-xs-12 col-md-7">
                                <div class="profile_photos">
                                    <?php if($row['path'] != null) :?>
                                        <img class="large_photo" src="/../../img/mini/<?php echo $row['path'] ?>" alt="Avatar">
                                        <img class="mini_photo" src="/../../img/add-image-big.jpg" alt="Avatar">
                                    <?php endif; ?>
                                    <?php if($row['path'] == null) :?>
                                        <img class="large_photo" src="/../../img/add-image-big.jpg" alt="Avatar">
                                        <img class="mini_photo" src="/../../img/add-image-big.jpg" alt="Avatar">
                                    <?php endif; ?>
                                </div>
                                <div class="profile_name_description_wrap clearfix">
                                    <h2 class="profile_name"><?php echo $row['name']?></h2>
                                    <p class="profile_description"><?php echo $row['about']?></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-5">
                                <ul class="profile_info_right clearfix">
                                    <li><?php echo $row['birthday']?></li>
                                    <li><?php echo $row['sity']?></li>
                                    <li><a href="#"><?php echo $row['email']?></a></li>
                                    <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile_wrapper_2">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <ul class="profile_menu">
                            <li><a href="<?php echo SITE_NAME?>index.php/user/home_page/<?php echo $row['id_user'] ?>">фотографии<br><span><?php foreach($img_count->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                            <li><a href="#">альбомы<br><span><?php foreach($albums->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                            <li><a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubcribers/<?php echo $this->session->userdata('id_user') ?>">подписчики<br><span><?php foreach($sub_count->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                            <li><a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubscription/<?php echo $this->session->userdata('id_user') ?>">подписки<br><span><?php foreach($u_sub->result_array() as $kk){ echo $kk['count'];} ?></span></a></li>
                            <li><a href="#">номинации<br><span>0</span></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <ul class="profile_action clearfix">
                            <?php if($this->session->userdata('id_user') != $row['id_user']) :?>
                                <li id="sub"><a href="#">Отписаться<i class="fa fa-times" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <li>
                                <a class="dots" href="#">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </header>
    <header class="header_str_photo block-header header-none" id="greenHead" style="display: none">
        <div class="container " >
            <div class="header_top clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="top-logo-wrapper">
                            <a href="<?php echo SITE_NAME?>index.php" class="header__logo-link">iananas</a>
                            <?php if($this->session->userdata('id_user') != null):?>
                                <a href="#" class="logo__subscribers">подписки</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8 col-lg-6 col-sm-8 col-lg-offset-2">
                        <div class="communication">
                            <input type="text" class="header_search_header" placeholder="Поиск">
                            <?php if($this->session->userdata('id_user') != null):?>
                                <ul class="top_header_menu">
                                    <li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                                    <li>
                                        <a id="userImageGreen" class="img-a" href="<?php echo SITE_NAME?>index.php/user/home_page/<?php echo $this->session->userdata('id_user') ?>">
                                            <img class="img-radius" src="/../../img/mini/<?php echo $this->session->userdata('path') ?>">
                                        </a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                            <?php if($this->session->userdata('id_user') == null):?>
                                <a class="buttons-head-1" href="<?php echo SITE_NAME?>index.php/user/login"> Войти </a>
                                <a class="buttons-head-1" href="<?php echo SITE_NAME?>index.php/user/registration"> Зарегистрироваться </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php endforeach; ?>

<section class="subscribers">
    <div class="container">
        <div class="row">
            <?php foreach($query->result_array() as $rowNot) :?>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="sub_item">
                        <div class="sub_avatar">
                            <?php if($rowNot['path'] != null):?>
                                <img src="/../../img/mini/<?php echo $rowNot['path']?>" alt="subscribers avatar">
                            <?php endif; ?>
                            <?php if($rowNot['path'] == null):?>
                                <img src="/../../img/add-image-big.jpg" alt="subscribers avatar">
                            <?php endif; ?>
                        </div>
                        <div class="sub_name"><?php echo $rowNot['name']?></div>
                        <a href="<?php echo SITE_NAME ?>index.php/Subscription/subscribe/<?php echo $rowNot['id_user']?>" class="sub_button">Подписаться<i class="fa fa-plus" aria-hidden="true"></i></a>
                        <div class="sub_person_info">
                            <div class="sub_person_photos">фотографии</div>
                            <div class="sub_person_subs">подписчики</div>
                            <div class="sub_person_subscription">подписки</div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script src="/../../js/common.js"></script>
</body>

</html>
<script>
    window.onload = function (){
        getUserImage('<?php echo $this->session->userdata('id_user') ?>');
        chekScroll();
    };

    function chekScroll(){
        var green = document.getElementById('greenHead');
        if(window.pageYOffset >= 500){
            green.setAttribute('style','display:block');
        }
        if(window.pageYOffset < 500){
            green.setAttribute('style','display:none');
        }
    }
</script>



<!--
<div>
    //<?php foreach ($object->result_array() as $row): ?>
    //    <li><?php echo $row['id_user']?></li> <br>
    //    <li><?php echo $row['name']?></li> <br>
    //    <li><?php echo $row['email']?></li> <br>
    //    <li><?php echo $row['about']?></li> <br>
    //    <li><?php echo $row['sity']?></li> <br>
    //    <li><?php echo $row['path']?></li> <br>
    //    <input type="button" id="" class="MyCompanion" onclick="openChatCompanion('<?php echo $row['id_user']?>','<?php echo $row['id_user']?>' )" value="Написать"/>
    //    <?php
    //        echo "<div class='chat_wrapper' id='".$row['id_user']."'><!-- Тут по идее id юзера в id-->
    //             <div class='m_box' id='"."1".$row['id_user']."'>";
    //    if($messages != null){
    //        foreach($messages ->result_array() as $notRow){
    //            if ($notRow['id_user']== $row['id_user'] | $notRow['id_companion'] == $row['id_user']){
    //                if($notRow['id_user']== $row['id_user']){
    //                    echo "
    //                        <div>
    //                            <span class = \"user_name\" style=\"color:black\">".$row['id_user']."</span>
    //                             :
    //                            <span class = \"user_message\">".$notRow['message']."</span>
    //                            <hidden class = \"user_companion\" value =\"php cod\">
    //                        </div>
    //                    ";
    //                } else {
    //                    echo "
    //                        <div>
    //                            <span class = \"user_name\" style=\"color:black\"> ".$notRow['id_user']."</span>
    //                             :
    //                            <span class = \"user_message\">".$notRow['message']."</span>
    //                            <hidden class = \"user_companion\" value =\"php cod\">
    //                        </div>
    //                    ";
    //                }
    //            }
    //        }
    //    }
    //        echo "</div>
    //             <div class='panel'>
    //        <input type='hidden' name='name' id='name".$row['id_user']."' value='".$this->session->userdata('id_user')."'/>
    //             <input type='hidden' name='companion' id='companion".$row['id_user']."' value='".$row['id_user']."'>
    //             <input type='text' name='message' id='message".$row['id_user']."' placeholder='Message' style='width:60%' />";
    //        echo '<button onclick="sendMessage('."'".$row['id_user']."'".')"> Отправить </button>
    //             </div>
    //             </div>';
    //    ?>
    //<?php endforeach; ?>
</div>


<input type="hidden" id="id_my" value="<?php echo $this->session->userdata('id_user') ?>">
<input type="hidden" id="my_com" value="">
<div id="ChatBody">
    <div class="message_box" id="message_box"></div>
</div>

<div id="ajax">

</div>
<button type="button" onclick="getAllMessages()"> Все сообщения </button>


    Получение текущей даты
    echo (date("d.m.Y h:I:s"));
    отображается сообщение в виде
    <div>
        <span class = "user_name" style="color:black"> php cod</span>
         :
        <span class = "user_message"> php cod </span>
        <hidden class = "user_companion" value ="php cod">
    </div>

<script type='text/javascript'>
    //Получаем время
    function time(){
        var data = new Date();
        var MyTime = (data.getDate()+'.'+data.getMonth()+'.'+data.getFullYear()+' '+data.getHours()+':'+data.getMinutes()+':'+data.getSeconds());
    };

    //Создаём чат
    //Нужно проверять не создан ли чат, т.к. предположительно удалять их мы не будем, а если его нет, то создаём.
    //Но возможно, что мы будем его удалять, тогда нам как раз
    function openChat(MyComp){
        var Companion = document.getElementById("id_my").value;
        var MyCompanion = MyComp;
        var ChatBody = document.getElementById("ChatBody");
        var Chat = document.createElement("div");
        Chat.innerHTML = "<input type='hidden' name='name' id='name' value='" + Companion + "'/><input type='text' name='message' id='message' placeholder='Сообщение'/><input type='hidden' name='companion' id='companion' value=''><button onclick='sendMessage(" + MyCompanion + ")'> Отправить </button>";
        ChatBody.appendChild(Chat);
    };

    //Отправляем сообщение в базу данных с помощью аджакса
    function addMessage(MyComp) {
        var id_user = document.getElementById('name'+MyComp).value;
        var id_companion = document.getElementById('companion'+MyComp).value;
        var message = document.getElementById('message'+MyComp).value;
        var data = time();
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("ajax").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "<?php echo SITE_NAME?>index.php/message/addMessage?id_user="+id_user+"&id_companion="+id_companion+"&message="+message+"&data="+data, true);
        xhttp.send();
    }

    // Открываем чат
    function openChatCompanion(Companion,MyComp2){
        var Chat;
        var Comp = Companion;
        Chat = document.getElementById(Comp);
        Chat.classList.add('chat_block');
        document.getElementById('my_com').setAttribute('value','1'+MyComp2)
    };

    function sendMessage(MyComp){
        var mymessage = $('#message'+MyComp).val();
        var myname = $('#name'+MyComp).val();
        var id_companion = document.getElementById('companion'+MyComp).value;

        if(mymessage == ""){
            alert("Enter Some message Please!");
            return;
        }

        var msg = {
            message: mymessage,
            name: myname,
            companion : id_companion,
            color : 'black'
        };
        websocket.send(JSON.stringify(msg));
        addMessage(MyComp);
    }

    //Теперь мы как раз таки получаем все сообщения и можем даже с ними что-то делать, это свершилось. Было сложно.
    //Получаем все сообщения и постараемся распихать их по нужным чатам
    function getAllMessages(){
        var text;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState==4 && xhttp.status==200){
                var jsonText = JSON.parse(xhttp.responseText);
                var jsonText2;
                for (key in jsonText) {
                    if (jsonText.hasOwnProperty(key)) {
                        console.log("Ключ = " + key);
                        console.log("Значение = " + jsonText[key]);
                        jsonText2 = jsonText[key];
                        for (key in jsonText2) {
                            if (jsonText2.hasOwnProperty(key)) {
                                console.log("Ключ = " + key);
                                console.log("Значение = " + jsonText2[key]);
                            }
                        }
                    }
                }
            }
        };
        xhttp.open("GET", "<?php echo SITE_NAME?>index.php/message/getAllMessage");
        xhttp.send();
    }

    //Клиет на JavaScript добавить открытие окна чата, если нам пришло сообщение или просто небольшое окошко при клике на котором
    //Будем выводить сам чат
    $(document).ready(function(){

        var wsUri = "ws://localhost:9000/demo/server.php";
        websocket = new WebSocket(wsUri);

        websocket.onopen = function(ev) {
            $('#message_box').append("<div class=\"system_msg\">Connected!</div>");
        };

        $('#send-btn').click(function(){
            var mymessage = $('#message').val();
            var myname = $('#name').val();
            var mycompanion = $('#MyCompanion');

            if(mymessage == ""){
                alert("Enter Some message Please!");
                return;
            }

            var msg = {
                message: mymessage,
                name: myname,
                companion : mycompanion,
                color : 'black'
            };
            websocket.send(JSON.stringify(msg));
            addMessage();
        });

        websocket.onmessage = function(ev) {
            var myname = $('#id_my').val();
            var msg = JSON.parse(ev.data);
            var type = msg.type;
            var umsg = msg.message;
            var uname = msg.name;
            var ucolor = msg.color;
            var ucompanion = msg.companion;
            var tutmessage =  document.getElementById('my_com').value;
            if(type == 'usermsg') {
                if ( uname == myname){
                    $("#"+tutmessage ).append("<div><span class=\"user_name\" style=\"color:#" + ucolor + "\">" + uname + "</span> : <span class=\"user_message\">" + umsg + "</span><hidden class = \"user_companion\" value =" + ucompanion + "></div>");
                }
                if( ucompanion == myname){
                    $("#"+"1"+uname ).append("<div><span class=\"user_name\" style=\"color:#" + ucolor + "\">" + uname + "</span> : <span class=\"user_message\">" + umsg + "</span><hidden class = \"user_companion\" value =" + ucompanion + "></div>");
                }
                //$("#"+tutmessage ).append("<div><span class=\"user_name\" style=\"color:#" + ucolor + "\">" + uname + "</span> : <span class=\"user_message\">" + umsg + "</span><hidden class = \"user_companion\" value =" + ucompanion + "></div>");
            }
            if(type == 'system') {
                $('#message_box').append("<div class=\"system_msg\">"+umsg+"</div>");
            }

            $('#message').val('');
        };

    });
</script>

<style type="text/css">

    .chat_wrapper {
        width: 500px;
        margin-right: auto;
        margin-left: auto;
        background: #CCCCCC;
        border: 1px solid #999999;
        padding: 10px;
        font: 12px 'lucida grande',tahoma,verdana,arial,sans-serif;
        display: none;

    }
    .chat_wrapper .m_box {
        background: #FFFFFF;
        height: 150px;
        overflow: auto;
        padding: 10px;
        border: 1px solid #999999;
    }
    .chat_wrapper .panel input{
        padding: 2px 2px 2px 5px;
    }
    .system_msg{color: #BDBDBD;font-style: italic;}
    .user_name{font-weight:bold;}
    .user_message{color: #88B6E0;}

    .chat_none{
        display: none;
    }

    .chat_block{
        display: block;
    }
</style>
-->