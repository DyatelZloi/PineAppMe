<div>
    <?php foreach ($object->result_array() as $row): ?>
        <li><?php echo $row['id_user']?></li> <br>
        <li><?php echo $row['name']?></li> <br>
        <li><?php echo $row['email']?></li> <br>
        <li><?php echo $row['about']?></li> <br>
        <li><?php echo $row['sity']?></li> <br>
        <li><?php echo $row['path']?></li> <br>
        <input type="button" id="" class="MyCompanion" onclick="openChatCompanion('<?php echo $row['id_user']?>','<?php echo $row['id_user']?>' )" value="Написать"/>
        <?php
            echo "<div class='chat_wrapper' id='".$row['id_user']."'><!-- Тут по идее id юзера в id-->
                 <div class='m_box' id='"."1".$row['id_user']."'>";
        if($messages != null){
            foreach($messages ->result_array() as $notRow){
                if ($notRow['id_user']== $row['id_user'] | $notRow['id_companion'] == $row['id_user']){
                    if($notRow['id_user']== $row['id_user']){
                        echo "
                            <div>
                                <span class = \"user_name\" style=\"color:black\">".$row['id_user']."</span>
                                 :
                                <span class = \"user_message\">".$notRow['message']."</span>
                                <hidden class = \"user_companion\" value =\"php cod\">
                            </div>
                        ";
                    } else {
                        echo "
                            <div>
                                <span class = \"user_name\" style=\"color:black\"> ".$notRow['id_user']."</span>
                                 :
                                <span class = \"user_message\">".$notRow['message']."</span>
                                <hidden class = \"user_companion\" value =\"php cod\">
                            </div>
                        ";
                    }
                }
            }
        }
            echo "</div>
                 <div class='panel'>
            <input type='hidden' name='name' id='name".$row['id_user']."' value='".$this->session->userdata('id_user')."'/>
                 <input type='hidden' name='companion' id='companion".$row['id_user']."' value='".$row['id_user']."'>
                 <input type='text' name='message' id='message".$row['id_user']."' placeholder='Message' style='width:60%' />";
            echo '<button onclick="sendMessage('."'".$row['id_user']."'".')"> Отправить </button>
                 </div>
                 </div>';
        ?>
    <?php endforeach; ?>
</div>


<input type="hidden" id="id_my" value="<?php echo $this->session->userdata('id_user') ?>">
<input type="hidden" id="my_com" value="">
<div id="ChatBody">
    <div class="message_box" id="message_box"></div>
</div>

<div id="ajax">

</div>
<button type="button" onclick="getAllMessages()"> Все сообщения </button>


<!--
    Получение текущей даты
    echo (date("d.m.Y h:I:s"));
    отображается сообщение в виде
    <div>
        <span class = "user_name" style="color:black"> php cod</span>
         :
        <span class = "user_message"> php cod </span>
        <hidden class = "user_companion" value ="php cod">
    </div>
-->

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
        xhttp.open("GET", "http://pineappme:81/index.php/message/addMessage?id_user="+id_user+"&id_companion="+id_companion+"&message="+message+"&data="+data, true);
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
        xhttp.open("GET", "http://pineappme:81/index.php/message/getAllMessage");
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