<?php $i = 0; $b = 0; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- адаптация под телефоны -->
    <meta name="description" content="Pineappme">
    <!-- описание страницы (записывать в content="сюда") -->
    <meta name="keywords" content="Pineappme">
    <!-- теги (записывать в content="сюда") -->
    <link rel="stylesheet" href="/../../css/bootstrap.min.css">
    <link rel="stylesheet" href="/../../css/font-awesome.min.css">
    <link rel="stylesheet" href="/../../css/style.css">
    <link rel="stylesheet" href="/../../css/media.css">
    <link rel="stylesheet" href="/../../css/css.css">
    <script src="/../../js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic" rel="stylesheet">

    <!-- Название страницы отображаемое в окне браузера сверху -->
    <title>Сообщения - Pineappme</title>

    <!-- Material Design Lite -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

    <!-- App Styling -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="/../../css/main.css">
</head>

<body class="messages_body">
<input type="hidden" id="id_user" value="<?php echo $this->session->userdata('id_user')?>">
<input type="hidden" id="active" value="Тут какой-то юзер">
<input type="hidden" id="userIcon" value="">
<header class="header_str_photo block-header">
    <div class="container">
        <div class="header_top clearfix">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="top-logo-wrapper">
                        <a href="<?php echo SITE_NAME?>index.php" class="header__logo-link">iananas</a>
                        <?php if($this->session->userdata('id_user') != null):?>
                            <a href="<?php echo SITE_NAME?>index.php/subscription/getAllSubscription/<?php echo $this->session->userdata('id_user') ?>" class="logo__subscribers">подписки</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-8 col-lg-6 col-sm-8 col-lg-offset-2">
                    <div class="communication">
                        <input type="text" class="header_search_header" placeholder="Поиск">
                        <?php if($this->session->userdata('id_user') != null):?>
                            <ul class="top_header_menu">
                                <li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo SITE_NAME ?>index.php/Message"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                                <li>
                                    <a id="userImage" class="img-a" href="<?php echo SITE_NAME?>index.php/user/home_page/<?php echo $this->session->userdata('id_user') ?>">
                                        <img class="img-radius" src="/../../img/mini/add-image-big.jpg">
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

<!-- Header section containing logo -->
<header class="mdl-layout__header mdl-color-text--white mdl-color--light-blue-700" style="display:none">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-grid">
        <div class="mdl-layout__header-row mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
            <h3><i class="material-icons">chat_bubble_outline</i> Friendly Chat</h3>
        </div>
        <div id="user-container">
            <div hidden id="user-pic"></div>
            <div hidden id="user-name"></div>
            <button hidden id="sign-out" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--white">
                Sign-out
            </button>
            <button hidden id="sign-in" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--white">
                <i class="material-icons">account_circle</i>Sign-in with Google
            </button>
        </div>
    </div>
</header>

<section class="messages_s">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="persons_box clearfix">
                    <?php foreach($users->result_array() as $row):?>
                        <?php if($i == 0){
                            $i++;
                            echo '<div class="person_item active clearfix"  id="user'.$row['id_user'].'" onclick="setActive('."'".$row['id_user']."'".","."'msg".$row['id_user'].$this->session->userdata('id_user')."'".')">
                                    <div class="person_avatar">
                                        <img src="/../../img/mini/'.$row['path'].'" alt="avatar">
                                    </div>
                                    <div class="person_info">
                                        <div class="person_name">'.$row['name'].'</div>
                                        <div class="person_time">2 минуты назад</div>
                                    </div>
                                 </div>
                                 <div id="msg'.$row['id_user'].''.$this->session->userdata('id_user').'" class="private_wrapper clearfix" style="display:block">
                                 </div>';
                        } else {
                            echo '<div class="person_item  clearfix" id="user'.$row['id_user'].'" onclick="setActive('."'".$row['id_user']."'".","."'msg".$row['id_user'].$this->session->userdata('id_user')."'".')">
                                    <div class="person_avatar">
                                        <img src="/../../img/mini/'.$row['path'].'" alt="avatar">
                                    </div>
                                    <div class="person_info">
                                        <div class="person_name">'.$row['name'].'</div>
                                        <div class="person_time">2 минуты назад</div>
                                    </div>
                                 </div>';}?>
                    <?php endforeach; ?>
                </div>

                <div class="private_wrapper clearfix">
                    <div class="private_item_1 clearfix">
                        <div class="person_name_and_tag">
                            <div class="private_name"><?php echo $this->session->userdata('name')?></div>
                            <div class="private_tag"><?php echo $this->session->userdata('email')?></div>
                        </div>
                        <div class="send_photo_wrapper">
                            <form id="image-form" action="#">
                                <input id="mediaCapture" type="file" accept="image/*,capture=camera">
                                <button id="submitImage" title="Add an image" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--amber-400 mdl-color-text--white">
                                    <i class="material-icons">image</i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="private_item_2 clearfix">
                        <div  id="userImageGreen" class="message_avatar">
                            <img src="/../../img/mini/add-image-big.jpg">
                        </div>

                        <form id="message-form" action="#">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="message">
                                <label class="mdl-textfield__label" for="message">Сообщение...</label>
                            </div>
                            <button id="submit" disabled type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                Отправить
                            </button>
                        </form>
                    </div>

                    <div class="private_item_3 clearfix">
                        <div class="demo-layout with-message">
                            <main class="height-message">
                                <div id="messages-card-container" >
                                    <!-- Messages container -->
                                    <div id="messages-card" class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                                            <div id="messages">
                                                <span id="message-filler"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="must-signin-snackbar" class="mdl-js-snackbar mdl-snackbar">
                                        <div class="mdl-snackbar__text"></div>
                                        <button class="mdl-snackbar__action" type="button"></button>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>


                    <?php foreach($users->result_array() as $row):?>
                        <?php
                            if($b == 0){
                                $b++;
                                echo '<div id="msg'.$row['id_user'].''.$this->session->userdata('id_user').
                                    '" class="private_item_3 clearfix" style="display:none"></div><input type="hidden"
                                    id="my-companion" value="'.$row['id_user'].'">';
                            } else {
                                echo '<div id="msg'.$row['id_user'].''.$this->session->userdata('id_user').
                                    '" class="private_item_3 clearfix" style="display:none"></div>';
                            }
                        ?>
                    <?php endforeach ?>
                    <input type="hidden" id="id-user" value="<?php echo $this->session->userdata('id_user')?>">
                    <input type="hidden" id="message-data" value="">
                    <!--
                    <div class="private_item_3 clearfix">

                        <div class="message_section_left clearfix">
                            <div class="message_section_avatar_left">
                                <img src="/../../img/message_avatar.png" alt="message avatar">
                            </div>
                            <div class="message_text_left">Привет!</div>
                            <div class="message_time_left">2 часа назад</div>
                        </div>

                        <div class="message_section_right clearfix">
                            <div class="message_section_avatar_right">
                                <img src="/../../img/message_avatar.png" alt="message avatar">
                            </div>
                            <div class="message_text_right">Привет!</div>
                            <div class="message_time_right">2 часа назад</div>
                        </div>
                    </div>
                    -->
                </div>

            </div>
        </div>
    </div>
</section>


<script src="https://www.gstatic.com/firebasejs/3.5.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.5.3/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.5.3/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.5.3/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.5.3/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyDLiqUmxvyp4TKge3r05eKvb_t1Zq5noHk",
        authDomain: "iananas-9a722.firebaseapp.com",
        databaseURL: "https://iananas-9a722.firebaseio.com",
        storageBucket: "iananas-9a722.appspot.com",
        messagingSenderId: "97785265059"
    };
    firebase.initializeApp(config);
</script>
<script src="/../../js/main.js"></script>
<script>
    function setActive(id, msg){
        document.getElementById(msg).setAttribute('style', 'display:none');
        var myId = '<?php echo $this->session->userdata('id_user')?>';
        var active = null;
        active = document.getElementsByClassName('person_item active clearfix');
        active[0].setAttribute('class', 'person_item  clearfix');
        var newActive = null;
        newActive = document.getElementById('user'+id);
        console.log(newActive);
        newActive.setAttribute('class', 'person_item active clearfix');
        var myCompanion = document.getElementById('my-companion');
        myCompanion.value = id;
        loadNew();
    }
</script>
</body>

</html>

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