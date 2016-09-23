<?php
class Admin extends CI_Controller{

    //TODO проверки
    //TODO проверки, кучу проверок.
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index(){
        echo 'В разработке!';
    }

    //Создать розыгрышь
    public function CreatePrizeDrawing(){

    }

    //Домашняя страница админа
    public function AdminPanel(){

    }




}

