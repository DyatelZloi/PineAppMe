<?php
class Admin extends CI_Controller{

    //TODO доработать админку и узнать чего в неё нужно сделать
    //TODO проверки, кучу проверок.
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    //Главная страница админки.
    public function index(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){

        } else echo 'В разработке!';
    }

    //Устанавливаем пользователя админом
    public function setAdmin(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = '';
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Забираем у пользователя админские права
    public function usentAdmin(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = '';
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Зайти в админ панель
    public function loginAdmin(){
        if($this->input->post('nickname') && $this->input->post('password')){
            $nickname = $this->input->post('nickname');
            $password = $this->input->post('password');
            $admin_nickname = '123';
            $admin_password = '123';
            if($nickname == $admin_nickname && $password == $admin_password){
                $newdata = array('admin' => 'true');
                $this->session->set_userdata($newdata);
                redirect(SITE_NAME.'index.php/AdminPanel/', 'refresh');
            }
        } else echo ' Не ввели данные или ошиблись';
    }

    //Выйти из панели
    public function logoutAdmin(){
        $this->session->unset_userdata('admin');
        redirect(SITE_NAME.'index.php/AdminPanel/', 'refresh');
    }
}

