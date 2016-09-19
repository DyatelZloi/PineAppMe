<?php
class Subscription extends CI_Controller{

    //I very sad, because i can't make this method is a private
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    //Подписываемся на других
    public function subscribe(){
        if ($this->input->post('id_user') && $this->session->userdata('id_user') != null){
            $id_subscriber = $this->session->userdata('id_user');
            $id_user = $this->input->post('id_user');
            $sql = "INSERT INTO `subscribers` (id_user, id_subscriber) VALUES("
                .(string)$this->db->escape($id_user).","
                .(string)$this->db->escape($id_subscriber).")";
            $query = $this->db->query($sql);
            $this->load->view('header');
            $this->load->view('subscribe_success');
            $this->load->view('footer');
        } else echo 'Не ввели данные';
    }

    //Отписываемся от других
    public function unsubscribe(){
        if ($this->input->post('id_user') && $this->session->userdata('id_user') != null){
            $id_subscriber = $this->session->userdata('id_user');
            $id_user = $this->input->post('id_user');
            $sql = "DELETE FROM `subscribers` WHERE id_subscriber ="
                .(string)$this->db->escape($id_subscriber).
                " AND id_user =".(string)$this->db->escape($id_user);
            $query = $this->db->query($sql);
            $this->load->view('header');
            $this->load->view('unsubscribe_success');
            $this->load->view('footer');
        } else echo 'Не ввели данные';
    }

    //Получить всех, кто подписался на нас
    public function getAllSubcribers(){
        if ($this->input->post('id_user')){
            $id_user = $this->input->post('id_user');
            $sql = "SELECT * FROM subscribers JOIN users WHERE subscribers.id_user =".(string)$this->db->escape($id_user).
                " AND users.id_user = subscribers.id_subscriber";
            $query = $this->db->query($sql);
            $this->load->view('header', array('title' => 'Подписчики'));
            $this->load->view('subscribe', array('object' => $query));
            $this->load->view('footer');
        }
    }

    //Получить всех, на кого подписаны мы
    public function getAllSubscription(){
            if ($this->input->post('id_user')){
                $id_user = $this->input->post('id_user');
                $sql = "SELECT * FROM subscribers JOIN users WHERE subscribers.id_subscriber =".(string)$this->db->escape($id_user).
                    "AND users.id_user = subscribers.id_user";
                $query = $this->db->query($sql);
                $this->load->view('header', array('title' => 'Подписки'));
                $this->load->view('subscription', array('object' => $query));
                $this->load->view('footer');
            }
    }

    //Посмотреть все новости из подписок
    //Примерно вот такой запрос
    //SELECT * FROM `subscribers`  NATURAL JOIN `images` NATURAL JOIN `users` WHERE subscribers.id_subscriber = 123 AND users.id_user = subscribers.id_user ORDER BY images.id_image DESC
    //Думаем над системой страниц, опять же с помощью ORDER BY, возможно использование ajax
    public function getAllNews(){
        if($this->session->userdata('id_user')){
            $id_user = $this->session->userdata('id_user');
            $sql = "SELECT * FROM `subscribers`  NATURAL JOIN `images` NATURAL JOIN `users` WHERE subscribers.id_subscriber = ".(string)$this->db->escape($id_user).
                "AND users.id_user = subscribers.id_user ORDER BY images.id_image DESC";
            $query = $this->db->query($sql);
            $this->load->view('header', array('title' => 'Подписки'));
            $this->load->view('news', array('images_data' => $query));
            $this->load->view('footer');
        } else echo 'Залогиньтесь';
    }

}