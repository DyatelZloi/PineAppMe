<?php
//TODO сюда правила валидации, а потом просто вызываем их
$config = array(
    'signup' => array(
        array(
            'field' => 'username',
            'label' => 'Имя пользователя',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Пароль',
            'rules' => 'required'
        ),
        array(
            'field' => 'passconf',
            'label' => 'Подтверждение пароля',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email адрес',
            'rules' => 'required'
        )
    ),
    'email' => array(
        array(
            'field' => 'emailaddress',
            'label' => 'Email адрес',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'name',
            'label' => 'Имя',
            'rules' => 'required|alpha'
        ),
        array(
            'field' => 'title',
            'label' => 'Должность',
            'rules' => 'required'
        ),
        array(
            'field' => 'message',
            'label' => 'Сообщение',
            'rules' => 'required'
        )
    )
);