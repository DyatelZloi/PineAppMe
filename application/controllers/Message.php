<?php
class Message extends CI_Controller{

    //TODO проверки, кучу проверок.
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index(){
        echo 'В разработке!';
    }

    //Если хочешь возвращать значение тебе неободимо сохранять запрос в отдельной переменной
    //Добавляем сообщение в базу данных
    public function addMessage($id_user = null, $id_companion = null, $message = null, $data = null, $read = null){
        if ($this->input->get('id_user') && $this->input->get('id_companion') && $this->input->get('message') && $this->input->get('data')) {
            $sql = "INSERT INTO `messages`(`id_user`, `id_companion`, `message`, `data`, `read`) VALUES ("
                   .(string)$this->db->escape($this->input->get('id_user')).","
                   .(string)$this->db->escape($this->input->get('id_companion')).","
                   .$this->db->escape($this->input->get('message')).","
                   .$this->db->escape($this->input->get('data')).","
                   .$this->db->escape($this->input->get('read')).
            ")";
            if(!$this->db->query($sql)){
                return 'Error database';
            }
        }
    }

    //Ставим сообщение в прочитано
    public function updateMessage(){

    }

    //Если хочешь возвращать значение тебе неободимо сохранять запрос в отдельной переменной
    //Получить все сообщения
    public function getAllMessage(){
        if( $this->session->userdata('id_user')){
            $sql = "SELECT * FROM messages WHERE id_user =".(string)$this->db->escape($this->session->userdata('id_user')).
                   " OR id_companion =".(string)$this->db->escape($this->session->userdata('id_user'));
            if(!$this->db->query($sql)){
                return 'Error database';
            }
        }
    }


}