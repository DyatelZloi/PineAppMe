<!-- Мысль дня:"Каждый может стать богом для себя, либо дьяволом."-->

<?php foreach ($images_data->result_array() as $row): ?>
    <?php echo form_open('image/getById/') ?>
        <input type="hidden" name="id" value="<?php echo $row['id_image']?>">
        <input type="submit" value="Просмотреть оригинал">
    </form>
    <br>
    <p><?php echo $row['id_image']?></p>
    <br>
    <img class="img-thumbnail" src="<?php echo '/../../img/mini/'.$row['path']; ?>">
<?php endforeach; ?>

Что готово
    1 Регистрация
    2 Добовление картинок
    3 Авторизация
    4 Хранение сессии в базе данных
    5 Вывод всех картинок
    6 Вывод определённой картинки(Двумя разными способами, на всякий пожарный)
    7 При загрузке создаётся маленький дубликат изображения, чтобы экономить трафик пользователя и увеличить скорость загрузки страниц
    8 Возможность лайкать
    9 Возможность подписываться на другого пользователя
    10 Удаление картинок из каталога
    11 Возможность отсабскрайбиться
    12 Возможность вернуть лайки назад
    13 Возможность создания своего каталога
    14 Добовление картинок в каталог
    15 Счётчик просмотров картинки
    16 Просмотрт профиля
    17 редактирование профиля
    18 Стоит переделать сабскайб/ансабскрайб и лайк/анлайк картинок, чтобы использовался ajax. Который как раз и будет пинать наши функции
    на сервере для работы
    19 Просмотреть самое популярное
    20 Просмотреть самое лайкаемое? О_о
    21 Просмотреть всех пользователей
    22 Возможность регестрироваться и авторизовываться через другие соц сети и прочее

    Что нужно сделать
    1 Чат между пользователями (Наброски готовы)
    7 Оповещение о событиях(Добавление картиноки, если мы на этого человека подписаны), вообще у нас есть отдельная страница новостей,
правда её приходится обновлять, чтобы получить новости, возможно стоит использовать ajax? Правда это может вызвать отдельные нагрузки на сервер
причём довольно мощные.
    11 Редактор картинок(позаимствуем на стороне)

    Думаем:
    1 Неободимо подумать над аватарами, делать это стандартным фото из бд или же создать отдельную базу и прочее?
    2 Над обложками для альбомов, это могут быть загружаемая отдельно картинка или одна из загруженных в альбом картинок, возможно будет какая-то
стандартная обложка для альбомов, в которых ничего нет или не загружена обложка.
    3

<!--
    Вопросы по проекту:
        1 С кем смогут переписываться пользователи? Между подписчиками или будет возможность добовлять в друзья и там уже с ними общаться?
        2 Будет ли возможность групповых чатов или всё будет сугубо между двумя лицами?
        3 Может они будут наоборот только групповые?
        4 Как долго будут храниться сообщения?
        5 Поддерживает ли сервер websocket?

        praise - похвала
        trash - мусор
-->