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
        if ($this->input->get('id_user') && $this->input->get('id_companion') && $this->input->get('message')) {
            $sql = "INSERT INTO `messages`(`id_user`, `id_companion`, `message`, `data`, `read`) VALUES ("
                   .(string)$this->db->escape($this->input->get('id_user')).","
                   .(string)$this->db->escape($this->input->get('id_companion')).","
                   .$this->db->escape($this->input->get('message')).","
                   .$this->db->escape($this->input->get('data')).","
                   .$this->db->escape($this->input->get('read')).
            ")";
           $this->db->query($sql);
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
            $object = $this->db->query($sql);
            $message = array();
            foreach($object ->result_array() as $notRow){
                $message['id_message'] = $notRow['id_message'];
                $message['id_user'] = $notRow['id_user'];
                $message['id_companion'] = $notRow['id_companion'];
                $message['message'] = $notRow['message'];
                $message['data'] = $notRow['data'];
                $message['read'] = $notRow['read'];
                echo json_encode($message);
            }
        }
    }


}