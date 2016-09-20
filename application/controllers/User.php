<?php
class User extends CI_Controller{

    //TODO проверки, кучу проверок.
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    //TODO реализовать
    public function index(){
        $this->login();
    }

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
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
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
                    'name'  => $user['name'],
                    'email'     => $user['email'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
            }
        }
        redirect('http://pineappme:81/index.php/', 'refresh');
    }


    //TODO вынести правила в отдельный файл конфигурации
    //Функция регистрации нового пользователя
    public function registration(){
        $this->form_validation->set_rules('id_user', 'Страница пользователя', 'required|min_length[5]|max_length[50]|is_unique[users.id_user]');
        $this->form_validation->set_rules('name', 'Имя пользователя', 'required');
        $this->form_validation->set_rules('email', 'Email адрес', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Пароль', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', array('title' => 'Регистрация'));
            $this->load->view('registration');
            $this->load->view('footer');
        }
        else {
            $id_user = $this->input->post('id_user');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if(!$this->new_user($id_user, $name, $email, $password)) echo 'Ошибка';
            $this->load->view('header', array('title' => 'Регистрация'));
            $this->load->view('registration_success');
            $this->load->view('footer');
        }
    }

    //Функция разлогирования, убираем все данные, которые помещаем при логине
    public function logout($log = null){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('id_user');
        if ($log != null) redirect('http://pineappme:81/index.php/', 'refresh');

    }

    public function logoutFromSite(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('id_user');
    }


    //получаем пользователя по емайл
    private function getByEmail($email){
        $sql = "SELECT * FROM users WHERE email = (".$this->db->escape($email).")";
        $query = $this->db->query($sql);
        $object = array();
        foreach ($query->result_array() as $row){
            $object['id_user'] = $row['id_user'];
            $object['password'] = $row['password'];
            $object['name'] = $row['name'];
            $object['email'] = $row['email'];
        }
        return $object;
    }

    //Выполняет запрос к базе данных, возвращает true или false, если запрос на добовление удачен/нет
    private function new_user(
        $id_user,
        $name,
        $email,
        $password
    ){
        $sql = "INSERT INTO users (
                  id_user,
                  name,
                  email,
                  password
                ) VALUES(
                  ".$this->db->escape($id_user).",
                  ".$this->db->escape($name).",
                  ".$this->db->escape($email).",
                  ".$this->db->escape($password)."
                )";
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
            $sql = "UPDATE `users` SET `id_user`=" . (string)$this->db->escape($id_user) .
                ",`name`=" . (string)$this->db->escape($name) .
                ",`email`=" . (string)$this->db->escape($email) .
                ",`about`=" . (string)$this->db->escape($about) .
                ",`sity`=" . (string)$this->db->escape($sity) .
                ",`birthday`=" . $this->db->escape($birthday) .
                ",`role`=" . (string)$this->db->escape($role) .
                ",`img`=" . (string)$this->db->escape($img) .
                ",`password`=" . (string)$this->db->escape($password) .
                " WHERE id_user =" . (string)$this->db->escape($id_user);
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
            $sql = "SELECT * FROM `users` WHERE id_user =".(string)$this->db->escape($id_user);
            $object = $query = $this->db->query($sql);
            $sql = "SELECT * FROM images WHERE id_user =".(string)$this->db->escape($id_user);
            $images = $query = $this->db->query($sql);
            $this->load->view('header', array('title' => 'Профиль'));
            $this->load->view('user', array('object' => $object, 'images' => $images));
            $this->load->view('footer');
        } else if ($id_user != null) {
            $sql = "SELECT * FROM `users` WHERE id_user = ". (string)$this->db->escape($id_user);
            $object = $query = $this->db->query($sql);
            $sql = "SELECT * FROM images WHERE id_user =".(string)$this->db->escape($id_user);
            $images = $query = $this->db->query($sql);
            $this->load->view('header', array('title' => 'Профиль'));
            $this->load->view('user', array('object' => $object, 'images' => $images));
            $this->load->view('footer');
        } else echo 'Такой пользователь не найден';
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM users";
        $object = $this->db->query($sql);
        $this->load->view('header', array('title' => 'Профиль'));
        $this->load->view('allusers', array('object' => $object));
        $this->load->view('footer');
    }

}