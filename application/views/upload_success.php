<html>
<head>
    <title>Форма загрузки</title>
</head>
<body>

<h3>Файл успешно загружен!</h3>

<ul>
    <?php foreach($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>

<p><a href="<?php echo SITE_NAME?>index.php/Image/load">Загрузить ещё</a></p>

</body>
</html>