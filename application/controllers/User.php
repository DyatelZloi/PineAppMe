<?php
class User extends CI_Controller{

    //TODO заменить post на get_post, пример : $this->input->get_post('id_image', TRUE)
    //TODO проверки, кучу проверок
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url', 'string'));
        $this->load->library(array('form_validation'));
    }

    //TODO реализовать
    public function index(){
        $this->login();
    }

    //TODO выпилить лишнюю функцию логина для сайта
    //Функция логина
    public function login(){
        $this->form_validation->set_rules('email', 'Email адрес', 'required');
        $this->form_validation->set_rules('password', 'Пароль', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth');
            $this->load->view('footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->logout();
            $user = $this->getByEmail($email);
            $us_pass = $user['password'];
            if ($user == null) return false;
            if ($us_pass == $password){
                $newdata = array(
                    'id_user' => $user['id_user'],
                    'name'  => $user['name'],
                    'email'     => $user['email'],
                    'path' => $user['path'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
            }
            redirect('http://pineappme:81/index.php/', 'refresh');
        }
    }

    //Логин/регистрация через модуль ulogin, если же юзера нет, значит создаём его.
    public function loginFromULogin(){
        if ($this->input->post('token')) {
            $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
            $user = json_decode($s, true);
            $id_user = random_string('alpha', 16);
            $name = $user['first_name'];
            $email = $user['email'];
            $newdata = array();
            $sql = "SELECT * FROM `users` WHERE `email` = ".(string)$this->db->escape($email);
            if (!$this->db->query($sql)) {
                $sql = "INSERT INTO `users` (`id_user`, `name`, `email`) VALUES(".$this->db->escape($id_user).",
                       ".$this->db->escape($name).",".$this->db->escape($email).")";
                $this->db->query($sql);
                $sql = "SELECT * FROM `users` LEFT OUTER JOIN `images` USING (id_image) WHERE users.email = (".$this->db->escape($email).")";
                $object = $this->db->query($sql);
                foreach ($object->result_array() as $row) {
                    $newdata['id_user'] = $row['id_user'];
                    $newdata['name'] = $row['name'];
                    $newdata['email'] = $row['email'];
                    $newdata['path'] = $row['path'];
                    $newdata['logged_in'] = TRUE;
                }
                $this->session->set_userdata($newdata);
                redirect('http://pineappme:81/index.php/', 'refresh');
            } else {
                $sql = "SELECT * FROM `users` LEFT OUTER JOIN `images` USING (id_image) WHERE users.email = (".$this->db->escape($email).")";
                $object = $this->db->query($sql);
                foreach ($object->result_array() as $row) {
                    $newdata['id_user'] = $row['id_user'];
                    $newdata['name'] = $row['name'];
                    $newdata['email'] = $row['email'];
                    $newdata['path'] = $row['path'];
                    $newdata['logged_in'] = TRUE;
                }
                $this->session->set_userdata($newdata);
                redirect('http://pineappme:81/index.php/', 'refresh');
            }
        }
    }

    //Функция логина с редиректом
    public function login2(){
        $this->form_validation->set_rules('email', 'Email адрес', 'required');
        $this->form_validation->set_rules('password', 'Пароль', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth');
            $this->load->view('footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->logout();
            $user = $this->getByEmail($email);
            $us_pass = $user['password'];
            if ($user == null) return false;
            if ($us_pass == $password){
                $newdata = array(
                    'id_user' => $user['id_user'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'path' => $user['path'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
            }
            redirect('http://pineappme:81/index.php/', 'refresh');
        }
    }


    //TODO вынести правила в отдельный файл конфигурации
    //Функция регистрации нового пользователя
    public function registration(){
        $this->form_validation->set_rules('id_user', 'Страница пользователя', 'required|min_length[5]|max_length[50]|is_unique[users.id_user]');
        $this->form_validation->set_rules('name', 'Имя пользователя', 'required');
        $this->form_validation->set_rules('email', 'Email адрес', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Пароль', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration');
        }
        else {
            $id_user = $this->input->post('id_user');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if(!$this->new_user($id_user, $name, $email, $password)) echo 'Ошибка';
            $this->load->view('registration_success');
        }
    }

    //Функция разлогирования, убираем все данные, которые помещаем при логине
    public function logout($log = null){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('path');
        if ($log != null) redirect('http://pineappme:81/index.php/', 'refresh');

    }

    //Выход с сайте, без редиректа
    public function logoutFromSite(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('path');
    }


    //получаем пользователя по емайл
    private function getByEmail($email){
        $sql = "SELECT * FROM `users` LEFT OUTER JOIN `images` USING (id_image) WHERE users.email = (".$this->db->escape($email).")";
        $query = $this->db->query($sql);
        $object = array();
        foreach ($query->result_array() as $row){
            $object['path'] = $row['path'];
            $object['id_user'] = $row['id_user'];
            $object['password'] = $row['password'];
            $object['name'] = $row['name'];
            $object['email'] = $row['email'];
        }
        return $object;
    }

    //Выполняет запрос к базе данных, возвращает true или false, если запрос на добовление удачен/нет
    private function new_user($id_user, $name, $email, $password){
        $sql = "INSERT INTO users (id_user, name, email, password) VALUES(
               ".$this->db->escape($id_user).",".$this->db->escape($name).",
               ".$this->db->escape($email).",".$this->db->escape($password).")";
        $query = $this->db->query($sql);
        return $query;
    }

    //TODO подумать над id т.к. при замене этого айди, мы не можем сверяться с полем айди, скорее всего нам понадобиться новое индексное поле
    //TODO role возможно это должен быть boolean, а не то, что сейчас
    //TODO с паролем тоже что-то страшно
    //Функция редактирования информации о себе любимом
    public function edit(){
        $id_user = $this->session->userdata('id_user');
        $user_data = "SELECT * FROM users WHERE id_user = ".(string)$this->db->escape($id_user);
        $this->form_validation->set_rules('id_user', 'Страница пользователя', 'required');
        $this->form_validation->set_rules('name', 'Имя пользователя', 'required');
        $this->form_validation->set_rules('email', 'Email адрес', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Пароль', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('user_edit', array('data' => $this->db->query($user_data)));
            $this->load->view('footer');
        }
        else {
            $id_user = $this->input->post('id_user');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $about = $this->input->post('about');
            $sity = $this->input->post('sity');
            $birthday = $this->input->post('birthday');
            $role = $this->input->post('role');
            $img = $this->input->post('img');
            $password = $this->input->post('password');
            $sql = "UPDATE `users` SET `id_user`=".$this->db->escape($id_user).
                   ",`name`=".(string)$this->db->escape($name).",`email`=".(string)$this->db->escape($email).
                   ",`about`=".$this->db->escape($about).",`sity`=".$this->db->escape($sity).
                   ",`birthday`=".$this->db->escape($birthday).",`role`=".(string)$this->db->escape($role).
                   ",`img`=".(string)$this->db->escape($img).",`password`=".(string)$this->db->escape($password).
                   " WHERE id_user =".(string)$this->db->escape($id_user);
            if ($this->db->query($sql)) {
                echo 'Информация изменена';
            } else echo 'Ошибка базы данных';
            $this->load->view('header', array('title' => 'Редактировать информацию'));
            $this->load->view('user_edit', array('data' => $this->db->query($user_data)));
            $this->load->view('footer');
        }
    }

    //TODO подумать над разбитием этого метода на два
    //TODO смена JOIN запроса на более адекватный
    //TODO Из-за джойна пользователи без картинок не могут увидеть свой профиль, подумай об этом
    //"SELECT * FROM `users` NATURAL JOIN `images` WHERE images.id_user = users.id_user AND users.id_user = "
    //Профиль пользователя
    //Возможно проверка создатель ли это данной страницы должна произваодиться во время печати самой страницы
    public function home_page($id_user = null){
        if ($this->input->post('id_user')) {
            $id_user = $this->input->post('id_user');
            $sql = "SELECT * FROM `users` LEFT OUTER JOIN `images` USING (id_image) WHERE users.id_user = ".(string)$this->db->escape($id_user);
            $object = $query = $this->db->query($sql);
            $sql = "SELECT * FROM images WHERE id_user =".(string)$this->db->escape($id_user);
            $images = $query = $this->db->query($sql);
            $this->load->view('indexHeader', array('title' => 'Профиль'));
            $this->load->view('user', array('object' => $object, 'images' => $images));
            $this->load->view('indexFooter');
        } else if ($id_user != null) {
            $sql = "SELECT * FROM `users` LEFT OUTER JOIN `images` USING (id_image) WHERE users.id_user = ".(string)$this->db->escape($id_user);
            $object = $query = $this->db->query($sql);
            $sql = "SELECT * FROM images WHERE id_user =".(string)$this->db->escape($id_user);
            $images = $query = $this->db->query($sql);
            $this->load->view('indexHeader', array('title' => 'Профиль'));
            $this->load->view('user', array('object' => $object, 'images' => $images));
            $this->load->view('indexFooter');
        } else echo 'Такой пользователь не найден';
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM users";
        $object = $this->db->query($sql);
        $this->load->view('header', array('title' => 'Профиль'));
        $this->load->view('allusers', array('object' => $object));
        $this->load->view('footer');
    }

    //Загружаем картинку для профиля
    public function loadImage(){

    }

    //TODO проверка айди владельца
    //Устанавливаем картинку для профиля из загруженных
    public function setImageFromImages(){
        if($this->session->userdata('id_user') && $this->input->get_post('id_image', TRUE) ){
            $sql = "UPDATE `users` SET `id_image`=".$this->db->escape($this->input->get_post('id_image', TRUE))
                   ." WHERE id_user =".(string)$this->db->escape($this->session->userdata('id_user'));
            if(!$this->db->query($sql)){
                echo 'Ошибка базы данных';
            }
        }
    }

    //загружаем бэкграунд для профиля
    public function loadBackground(){

    }

    //TODO проверка айди владельца
    //Установка бэкграунда из загруженных картинко для профиля
    public function setBackgroundFromImages(){
        if($this->session->userdata('id_user') && $this->input->get_post('id_image', TRUE)){
            $sql = "UPDATE `users` SET `background`=".$this->db->escape($this->input->get_post('id_image', TRUE))
                   ." WHERE id_user =".(string)$this->db->escape($this->session->userdata('id_user'));
            if(!$this->db->query($sql)){
                echo 'Ошибка базы данных';
            }
        }
    }

    //Также необходимо, чтобы были какие-то стандартыне значения для новых пользователей и стандартные картинки фона/аватарки
    //Можно сделать две формы, с одной кнопкой-обработчиком. При нажатии которой будем проверять если что-то в поле с картинкой
    //есть, значит будет второй запрос к серверу, для загрузки картинки
    //Или же можно пинать сервер с помощью аджакса, пускай загружает

    //Установка ip пользователя
    public function getIp(){
        if($this->session->userdata('id_user')){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])){
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $sql = "UPDATE `users` SET `ip_user`=".$this->db->escape($ip)." WHERE id_user =".
                   (string)$this->db->escape($this->session->userdata('id_user'));
            $this->db->query($sql);
        }
    }

    //TODO почему-то сообщения не приходят на почту, хотя явно отрабатывает без ошибок
    //Отправка сообщения
    public function sendEmailMessage(){
        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->from('nikiformalkov@gmail.com', 'Your Name');
        $this->email->to('nikiforma@mail.ru');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
    }
    //Сообщение с подтверждение будет тогда только если мы через другие соц сети регаемся, опять же ошибка, если запретить email
    //Вааах, почему-то после того, как я сделал страницу с регистрацией и произвёл некоторые настройки она перестала отрабатывать как
    //надо
    //некоторые баги фиксятся больше часа, хоть они всего-лишь мелкие баги, ибо ты не совсем понимаешь их происхождение и многое другое
    //некоторые из них настолько мелки и смешны, очевидны, что сам не понимаешь почему ты этого не предусмотрел

}