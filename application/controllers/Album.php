<?php
class Album extends CI_Controller{

    //TODO проверки, кучу проверок.

    //I very sad, because i can't make this method is a private
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    //По индексу получаем все альбомы данного пользователя
    public function index($id_user = null){
        if($this->session->userdata('id_user') == null){
            echo 'Залогиньтесь';
        } else {
            $id_user = $this->session->userdata('id_user');
            $query = $this->getAllAlbumsByUser($id_user);
            $this->load->view('header', array('title' => 'Альбомы'));
            $this->load->view('albums', array('error' => ' ', 'albums' => $query));
            $this->load->view('footer');
        }
    }

    //Получить альбомы пользователя
    public function getAlbums($id_user = null){
        if($this->session->userdata('id_user') == null){
            if ($id_user != null){
                $query = $this->getAllAlbumsByUser($id_user);
                $this->load->view('header', array('title' => 'Альбомы'));
                $this->load->view('albums', array('error' => ' ', 'albums' => $query));
                $this->load->view('footer');
            }
        } else {
            $id_user = $this->session->userdata('id_user');
            $query = $this->getAllAlbumsByUser($id_user);
            $this->load->view('header', array('title' => 'Альбомы'));
            $this->load->view('albums', array('error' => ' ', 'albums' => $query));
            $this->load->view('footer');
        }
    }

    //TODO  согласовать кое-какие детали по размерам обложки и прочее
    //TODO проверка если не добавилась картинка, значит запись тоже
    //Создание нового альбома
    public function newAlbum(){
        if($this->session->userdata('id_user') != null) {
            $this->form_validation->set_rules('name', 'Имя альбома', 'required');
            $this->form_validation->set_rules('about', 'Описание альбома', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header', array('title' => 'Создать альбом'));
                $this->load->view('new_album', array('error' => ' '));
                $this->load->view('footer');
            }
            else {
                $id_user = $this->session->userdata('id_user');
                $name = $this->input->post('name');
                $about = $this->input->post('about');
                $sql = "INSERT INTO `albums`(`name`, `about`, `id_user`) VALUES (" .
                    (string)$this->db->escape($name).",".
                    (string)$this->db->escape($about).",".
                    (string)$this->db->escape($id_user).")";
                $this->db->query($sql);
                //Пробуем загрузку изображения
                //Настройки
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']	= '1024';
                $config['max_width']  = '2000';
                $config['max_height']  = '2000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());
                    echo $error;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $file_name = array();
                    //TODO можно заменить на конструкцию проще
                    foreach($data as $item){
                        $file_name['file_name'] = $item['file_name'];
                    }
                    $sql = "UPDATE `albums` SET `сover`=".$this->db->escape($file_name['file_name'])." WHERE name ="
                        .(string)$this->db->escape($name);
                    $query = $this->db->query($sql);
                    $config['image_library'] = 'gd2';
                    $config['source_image']	= './uploads/'.$file_name['file_name'];
                    $config['new_image'] = './img/mini/'.$file_name['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']	= 100;
                    $config['height']	= 100;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
            }
        } else echo 'Залогиньтесь';
    }

    //Получаем все альбомы этого юзера по ИД
    private function getAllAlbumsByUser($id_user){
        $sql = "SELECT * FROM `albums` WHERE id_user = ".(string)$this->db->escape($id_user);
        $query = $this->db->query($sql);
        return $query;
    }

    //Удаление альбома по названию
    public function delAlbumByName(){
        if($this->input->post('name')){
            $name = $this->input->post('name');
            $sql = "DELETE FROM `albums` WHERE name = ".(string)$this->db->escape($name);
            $query = $this->db->query($sql);
        }
    }

    //Удаление альбома по ИД
    public function delAlbumById(){
        if($this->input->post('id_album') && $this->session->userdata('id_user') != null){
            $id_user = $this->session->userdata('id_user');
            $id = $this->input->post('id_album');
            $sql = "DELETE FROM `albums` WHERE id_album = " .
                $this->db->escape($id)." AND id_user = ".
                (string)$this->db->escape($id_user);
            $query = $this->db->query($sql);
        }
    }

    //Получаем альбом по названию
    public function getAlbumByName(){
        if($this->input->post('name')){
            $name = $this->input->post('name');
            $sql = "SELECT * FROM `albums` WHERE name = ".(string)$this->db->escape($name);
            $query = $this->db->query($sql);
        }
    }

    //Получаем альбом по ИД
    public function getAlbumById(){
        if($this->input->post('id')){
            $id = $this->input->post('id');
            $sql = "SELECT * FROM `albums` WHERE id_album = ".$this->db->escape($id);
            $query = $this->db->query($sql);
        }
    }

    //Делаем sql запрос к бд, получаем инфу об альбоме, а затем уже вводим данные
    public function editAlbum(){
        if ($this->input->post('id_album')){
            $id_album = $this->input->post('id_album');
            $sql = "SELECT * FROM `albums` WHERE id_album = ".$this->db->escape($id_album);
            $album_data = array('album_data' => $this->db->query($sql));
            $this->load->view('header', array('title' => 'Редактировать альбом'));
            $this->load->view('edit_album',$album_data);
            $this->load->view('footer');
        }
    }

    //Редактирование альбома
    public function do_edit_Album(){
        if($this->input->post('id_album') ){
            $id_album = $this->input->post('id_album');
            $name = $this->input->post('name');
            $about = $this->input->post('about');
            $sql = "UPDATE `albums` SET `name`=".
                $this->db->escape($name).
                ",`about`=".$this->db->escape($about).
                " WHERE id_album=".$this->db->escape($id_album);
            $query = $this->db->query($sql);
        }
    }

    //TODO не index, а отдельный
    //Просмотр картинок в альбоме
    public function getImagesFromAlbum($id_album = null){
        if ($id_album != null){
            $sql = "SELECT * FROM `images` WHERE id_album = ".$this->db->escape($id_album);
            $images_data = $this->db->query($sql);
            $this->load->view('header', array('title' => 'Редактировать альбом'));
            $this->load->view('album_view', array('images_data' => $images_data));
            $this->load->view('footer');
        }
    }
}