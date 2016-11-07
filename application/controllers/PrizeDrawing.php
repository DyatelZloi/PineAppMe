<?php
class PrizeDrawing extends CI_Controller{

    //TODO почитать про firebase, его можно использовать вместе с javascript.
    //Возможно у тебя появиться желания переделать всё используя firebase
    //TODO Сделать отображения и
    //TODO проверки, кучу проверок.
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('prizeDrawing',array());
    }

    //Создаём розыгрышь призов
    public function createPrizeDrawing(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = 'INSERT INTO `prizeDrawing`( `name_prize_drawing`, `data_begin_prize_drawing`,
                   `data_end_prize_drawing`) VALUES ( '.$this->db->escape($this->input->post()).
                   ', '.$this->db->escape($this->input->post()).', '.$this->db->escape($this->input->post()).')';
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Редактируем розыгрыш призов
    public function editPrizeDrawing(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = 'UPDATE `prizeDrawing` SET `name_prize_drawing` = '.$this->db->escape($this->input->post()).
                   ',`data_begin_prize_drawing` = '.$this->db->escape($this->input->post()).
                   ',`data_end_prize_drawing` = '.$this->db->escape($this->input->post()).
                   ' WHERE `id_prize_drawing` = '.$this->db->escape($this->input->post());
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Завершаем розгрыш призов
    public function endPrizeDrawing(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = '';
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Удаляем розыгрыш призов
    public function deletePrizeDrawing(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = 'DELETE FROM `prizeDrawing` WHERE id_prize_drawing = '.$this->db->escape($this->input->post());
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Добавляем приз к розыгрышу
    public function addPrize(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = 'INSERT INTO `prize`(`name_prize`, `about_prize`, `id_image`, `count_prize`, `id_prize_drawing`)
                   VALUES ( '.$this->db->escape($this->input->post()).
                   ', '.$this->db->escape($this->input->post()).', '.$this->db->escape($this->input->post()).
                   ', '.$this->db->escape($this->input->post()).', '.$this->db->escape($this->input->post()).')';
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Редактируем приз
    public function editPrize(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = 'UPDATE `prize` SET `name_prize` = '.$this->db->escape($this->input->post()).', `about_prize` = '.$this->db->escape($this->input->post()).
                   ', `id_image` = '.$this->db->escape($this->input->post()).', `count_prize` = '.$this->db->escape($this->input->post()).
                   ', `id_prize_drawing` = '.$this->db->escape($this->input->post()).' WHERE `id_prize` = '.$this->db->escape($this->input->post());
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Удаляем приз из розыгрыша
    public function deletePrize(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = 'DELETE FROM `prize` WHERE id_prize = '.$this->db->escape($this->input->post());
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Создаём номинацию
    public function createNomination(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = 'INSERT INTO `Nomination`(`name_nomination`, `about_nomination`, `id_prize_drawing`) VALUES
                   ('.$this->db->escape($this->input->post()).', '.$this->db->escape($this->input->post()).', '
                   .$this->db->escape($this->input->post()).')';
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Редактируем номинацию
    public function editNomination(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = 'UPDATE `Nomination` SET `name_nomination` = '.$this->db->escape($this->input->post()).',`about_nomination` = '
                   .$this->db->escape($this->input->post()).',`id_prize_drawing` = '.$this->db->escape($this->input->post()).
                   ' WHERE `id_nomination` = '.$this->db->escape($this->input->post());
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //Удаляем номинацию
    public function deleteNomination(){
        if( $this->session->userdata('role') != null && $this->session->userdata('role') == 'admin'){
            $sql = 'DELETE FROM `Nomination` WHERE id_nomination = '.$this->db->escape($this->input->post());
            if(!$this->db->query($sql)){
                echo 'Error Database';
            }
        }
    }

    //TODO добавить поля к фотографии id_prizeDrawing, id_nomination название картинки, описание картинки
}

