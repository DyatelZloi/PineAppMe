<div>
    <?php foreach ($object->result_array() as $row): ?>
        <li><?php echo $row['id_user']?></li> <br>
        <li><?php echo $row['name']?></li> <br>
        <li><?php echo $row['email']?></li> <br>
        <li><?php echo $row['about']?></li> <br>
        <li><?php echo $row['sity']?></li> <br>
        <input type="button" id="" class="MyCompanion" onclick="openChatCompanion('<?php echo $row['id_user']?>')" value="Написать"/>
        <!--
            <?php if($messages != null):?>
                <?php foreach($messages ->result_array() as $notRow):?>
                    <?php echo $notRow['id_message'] ?><br>
                    <?php echo $notRow['id_user'] ?><br>
                    <?php echo $notRow['id_companion'] ?><br>
                    <?php echo $notRow['message'] ?><br>
                    <?php echo $notRow['data'] ?><br>
                <?php endforeach; ?>
            <?php endif; ?>
        -->
        <?php
            echo "<div class='chat_wrapper' id='".$row['id_user']."'><!-- Тут по идее id юзера в id-->
                <div class='m_box' id='m_box'></div>
                    <div class='panel'>
                        <input type='hidden' name='name' id='name".$row['id_user']."' value='".$this->session->userdata('id_user')."'/>
                        <input type='hidden' name='companion' id='companion".$row['id_user']."' value='".$row['id_user']."'>
                        <input type='text' name='message' id='message".$row['id_user']."' placeholder='Message' style='width:60%' />";

                echo '<button onclick="addMessage('."'".$row['id_user']."'".')"> Отправить </button>
                    </div>
            </div>';
        ?>
    <?php endforeach; ?>
</div>


<input type="hidden" id="id_my" value="<?php echo $this->session->userdata('id_user') ?>">
<div id="ChatBody">
    <div class="message_box" id="message_box"></div>
</div>
<!--
    Готово:

    Необходимо:
    Установка нового ip пользователю при заходе на сайт, если он был изменён.
    Теперь можно реализовывать выборку сообщений из базы, сейчас этим и займусь

    1 Установить линукс или сделать себе на виртуальную машину;
    2 Делаем выборку подписчиков и узнаём их ip; +
    3 Скрываем поля, что кто-то подключился и отключился; +
    4 при подключении показываем, что пользователь онлайн, сравниваем есть ли такой ip у нас, если есть - значит он онлайн;
    5 при отключении показываем, что пользователь оффлайн, сравниваем есть ли такой ip онлайн, если есть - значит оффаем;
    6 при клике на пользователя выбираем все сообщения его нам и наши ему, грузим их;
    7 Если нам написали показываем это рядом с онлайном пользователя;
    8 Необходимо подумать над запросами к бд, при отправке/получении сообщения и как мы будем определять прочитанные сообщения;
    9 Сообщение, от кого, кому, дата, id сообщения, прочитано(если будем каждый раз ещё и при получении базу дёргать это может быть не очень хорошо)
    10 При клике на пользователя открываем окно диалога с ним
    11 При клике на другого открываем другое окно, а другие окна скрываем
    12 При подключении создаём диалоговые окна для всех, загружаем в них прошлые сообщения, но скрываем их и показываем только при необходимости
    13
-->

<script type='text/javascript'>
    //TODO проверка из какого дива мы пишем
    //TODO проверка в какой див пишут нам
    //TODO итоговый вывод в нужный див нужной информации
    //TODO запись переписки в базу данных
    //TODO извлечение переписки с конкретным пользователем из базы данных
    //Отлично! Мы сделали это! Такими темпами чатик будет готов, когда-нибудь уж точно будет...

    //Функция проверки наличия чата
    function chetChat(){

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
        var now = new Date(); // С датой надо будет разобраться возможно реализация на php
        var data = now.getFullYear(); // С датой надо будет разобраться возможно реализация на php
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("ajax").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "http://pineappme:81/index.php/message/addMessage?id_user="+id_user+"&id_companion="+id_companion+"&message="+message+"&data="+data, true);
        xhttp.send();
    }

    // Надо будет сделать проверку чтобы скрывать ненужные чаты или же открывать новый поверх старых, а если решим вернуться в старый
    // Будем отображать его сверху
    // Открываем чат
    function openChatCompanion(Companion){
        var Chat;
        var Comp = Companion;
        Chat = document.getElementById(Comp);
        Chat.classList.add('chat_block');
    };

    //Закрываем чат
    //Мы можем его вообще удалить, но будет ли это правильно? Наверное его просто нужно скрывать от посторонних глаз.
    //Да шучу я, удалять тоже можно.
    function closeChat(){

    };

    function sendMessage(MyComp){
        var mymessage = $('#message').val();
        var myname = $('#name').val();
        var mycompanion = MyComp;

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
            //addMessage();
        });

        websocket.onmessage = function(ev) {
            var myname = $('#id_my').val();
            var msg = JSON.parse(ev.data);
            var type = msg.type;
            var umsg = msg.message;
            var uname = msg.name;
            var ucolor = msg.color;
            var ucompanion = msg.companion;
            if (ucompanion == myname | uname == myname){
                if(type == 'usermsg') {
                    $('#message_box').append("<div><span class=\"user_name\" style=\"color:#"+ucolor+"\">"+uname+"</span> : <span class=\"user_message\">"+umsg+"</span> <h1>"+ucompanion+"</h1></div>");
                }
            }
            if(type == 'system') {
                $('#message_box').append("<div class=\"system_msg\">"+umsg+"</div>");
            }

            $('#message').val('');
        };

    });
</script>

<style type="text/css">
    <!--
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
    -->

    .chat_none{
        display: none;
    }

    .chat_block{
        display: block;
    }
</style>

<!--
Важная информация - обычно шеф приходит к 15:00
Сегодня работаем и дома, примерно с 21 00 до 23 00
-->