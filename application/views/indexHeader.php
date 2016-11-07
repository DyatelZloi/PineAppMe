<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- адаптация под телефоны -->
    <meta name="description" content="Pineappme"> <!-- описание страницы (записывать в content="сюда") -->
    <meta name="keywords" content="Pineappme"> <!-- теги (записывать в content="сюда") -->
    <link rel="stylesheet" href="/../../css/bootstrap.min.css">
    <link rel="stylesheet" href="/../../css/flipclock.css"> <!-- внешний вид таймера -->
    <link rel="stylesheet" href="/../../css/font-awesome.min.css">
    <link rel="stylesheet" href="/../../css/style.css">
    <link rel="stylesheet" href="/../../css/media.css">
    <link rel="stylesheet" href="/../../css/css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/../../js/scripts.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-messaging.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic" rel="stylesheet">
    <title>Главная - Pineappme</title> <!-- Название страницы отображаемое в окне браузера сверху -->
</head>

<body class="home_document" onscroll="chekScroll()" onload="getUserImage('<?php echo $this->session->userdata('id_user') ?>')">