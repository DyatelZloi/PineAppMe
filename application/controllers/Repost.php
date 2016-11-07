<?php
class Repost extends CI_Controller{

    //TODO заменить post на get_post, пример : $this->input->get_post('id_image', TRUE)
    //TODO проверки, кучу проверок.
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index(){
        echo 'В разработке!';
    }

    //Репостим картинку
    public function repost(){
        if($this->input->get_post('id_image', TRUE) && $this->session->userdata('id_user')){
            $sql = "INSERT INTO `repost`(`id_user`, `id_content`) VALUES ("
                   .(string)$this->db->escape($this->session->userdata('id_user')).","
                   .$this->db->escape($this->input->get_post('id_image', TRUE)).")";
            if($this->db->query($sql)){
                echo 'Error database';
            }
        }
    }

    //Удаляем репост
    public function deleteRepost(){
        if($this->input->get_post('id_repost', TRUE) && $this->session->userdata('id_user')){
            $sql = "DELETE FROM `repost` WHERE id_repost =".$this->db->escape($this->input->get_post('id_repost', TRUE))
                   ." AND id_user =".(string)$this->db->escape($this->session->userdata('id_user'));
            if($this->db->query($sql)){
                echo 'Error database';
            }
        }
    }
}


