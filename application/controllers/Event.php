<?php
class Event extends CI_Controller{

    //TODO проверки, кучу проверок.
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index(){
        echo 'В разработке!';
    }

    //Создания какого-то события
    public function createEvent(){
        //Загрузка картинки
        if($this->session->userdata('id_user') && $this->input->get_post('id_image', TRUE)){
            $sql = "INSERT INTO `events`(`id_user`, `id_image`) VALUES (".
                   (string)$this->db->escape($this->session->userdata('id_user')).",".
                   $this->db->escape($this->input->get_post('id_image', TRUE)).")";
            if(!$this->db->query($sql)){
                echo ' Database error ';
            }
        }
        //Лайк
        if($this->session->userdata('id_user') && $this->input->get_post('id_like', TRUE)){
            $sql = "INSERT INTO `events`(`id_user`, `id_like`) VALUES (".
                   (string)$this->db->escape($this->session->userdata('id_user')).",".
                   $this->db->escape($this->input->get_post('id_like', TRUE)).")";
            if(!$this->db->query($sql)){
                echo ' Database error ';
            }
        }
        //Подписался на что-то
        if($this->session->userdata('id_user') && $this->input->get_post('id_subscribe', TRUE)){
            $sql = "INSERT INTO `events`(`id_user`, `id_subscribe`) VALUES (".
                   (string)$this->db->escape($this->session->userdata('id_user')).",".
                   $this->db->escape($this->input->get_post('id_subscribe', TRUE)).")";
            if(!$this->db->query($sql)){
                echo ' Database error ';
            }
        }
        //Репостнул что-то
        if($this->session->userdata('id_user') && $this->input->get_post('id_repost', TRUE)){
            $sql = "INSERT INTO `events`(`id_user`, `id_repost`) VALUES (".
                   (string)$this->db->escape($this->session->userdata('id_user')).",".
                   $this->db->escape($this->input->get_post('id_repost', TRUE)).")";
            if(!$this->db->query($sql)){
                echo ' Database error ';
            }
        }
    }

    //Удаление какого-то события
    public function deleteEvent(){
        //Загрузка картинки
        if($this->session->userdata('id_user') && $this->input->get_post('id_image', TRUE)){
            $sql = "DELETE FROM `events` WHERE id_user =".
                   (string)$this->db->escape($this->session->userdata('id_user'))." AND id_image =".
                   $this->db->escape($this->input->get_post('id_image', TRUE));
            if(!$this->db->query($sql)){
                echo ' Database error ';
            }
        }
        //Лайк
        if($this->session->userdata('id_user') && $this->input->get_post('id_like', TRUE)){
            $sql = "DELETE FROM `events` WHERE id_user =".
                   (string)$this->db->escape($this->session->userdata('id_user'))." AND id_like =".
                   $this->db->escape($this->input->get_post('id_like', TRUE));
            if(!$this->db->query($sql)){
                echo ' Database error ';
            }
        }
        //Подписался на что-то
        if($this->session->userdata('id_user') && $this->input->get_post('id_subscribe', TRUE)){
            $sql = "DELETE FROM `events` WHERE id_user =".
                   (string)$this->db->escape($this->session->userdata('id_user'))." AND id_subscribe =".
                   $this->db->escape($this->input->get_post('id_subscribe', TRUE));
            if(!$this->db->query($sql)){
                echo ' Database error ';
            }
        }
        //Репостнул что-то
        if($this->session->userdata('id_user') && $this->input->get_post('id_repost', TRUE)){
            $sql = "DELETE FROM `events` WHERE id_user =".
                   (string)$this->db->escape($this->session->userdata('id_user'))." AND id_repost =".
                   $this->db->escape($this->input->get_post('id_repost', TRUE));
            if(!$this->db->query($sql)){
                echo ' Database error ';
            }
        }
    }

    //Получаем все события
    public function getAllEvents(){
        //Мысль дня: Приджойни ещё и весь мир впридачу
        $sql = " SELECT * FROM `events` NATURAL JOIN images NATURAL JOIN like NATURAL JOIN subscribers NATURAL JOIN users";
        if($this->db->query($sql)){

        }
    }
}
