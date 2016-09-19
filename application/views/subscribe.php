<?php foreach ($object->result_array() as $row): ?>
    <li><?php echo $row['id_user']?></li> <br>
    <li><?php echo $row['name']?></li> <br>
    <li><?php echo $row['email']?></li> <br>
    <li><?php echo $row['about']?></li> <br>
    <li><?php echo $row['sity']?></li> <br>
    <input type="button" id="" class="MyCompanion" onclick="openChat(<?php echo $row['id_user']?>)" value="Написать"/>
<?php endforeach; ?>

<input type="hidden" id="id_my" value="<?php echo $this->session->userdata('id_user') ?>">
<div id="ChatBody">
    <div class="message_box" id="message_box"></div>
</div>

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