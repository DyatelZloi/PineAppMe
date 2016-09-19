<?php
class Image extends CI_Controller{

    //TODO дата добавления картинки
    //TODO заменить echo на посмотри документацию
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //Получаем все картинки
    public function index(){
        $sql = "SELECT * FROM `images`";
        $images_data = array('images_data' => $query = $this->db->query($sql));
        $this->load->view('header', array('title' => 'Все картинки'));
        $this->load->view('index',$images_data);
        $this->load->view('footer');
    }

    //Показывает загрузочную форму
    public function load(){
        if($this->session->userdata('id_user') == null){
            echo 'Залогиньтесь';
        } else {
            $id_user = $this->session->userdata('id_user');
            $sql = 'SELECT * FROM albums WHERE id_user ='.(string)$this->db->escape($id_user);
            if($this->db->query($sql)){
                $albums = $this->db->query($sql);
            } else $albums = null;
            $this->load->view('header', array('title' => 'Загрузить картинку'));
            $this->load->view('upload_form', array('error' => ' ', 'albums' => $albums));
            $this->load->view('footer');
        }
    }

    //Удаление картинки
    public function del($id = null, $path = null){
        if ($this->input->post('id') && $this->input->post('path')){
            $id_image = $this->input->post('id');
            $path = $this->input->post('path');
            $sql = "DELETE FROM `images` WHERE id_image = ("
                   .$this->db->escape($id_image).") AND id_user ="
                   .(string)$this->db->escape($this->session->userdata('id_user'));
            if($this->db->query($sql)){
                $filename = './img/mini/'.$path;
                unlink($filename);
                $filename = './uploads/'.$path;
                unlink($filename);
                $this->load->view('header', array('title' => 'Картинка удалена'));
                echo 'Картинка удалена';
                $this->load->view('footer');
            } else echo 'Ошибка';
        } else if ($id != null && $path != null){
            $id_image = $id;
            $sql = "DELETE FROM `images` WHERE id_image = (".$this->db->escape($id_image)."AND id_user ="
                   .(string)$this->db->escape($this->session->userdata('id_user'));
            if($this->db->query($sql)) {
                $filename = './img/mini/'.$path;
                unlink($filename);
                $filename = './uploads/'.$path;
                unlink($filename);
                $this->load->view('header', array('title' => 'Картинка удалена'));
                echo 'Картинка удалена';
                $this->load->view('footer');
            } else echo 'Ошибка';
        } else echo 'Не введён id';
    }

    //TODO подумать над join, иначе некрасиво получается
    //TODO join передаём информацию о лайках, пользователе загрузившем изображение
    //SELECT * FROM `images` JOIN `like`  WHERE images.id_image = (19) AND like.id_image = images.id_image
    //Получаем оригинал изображения по ид картинки
    public function getById($id = null){
        if ($this->input->post('id')){
            $id_image = $this->input->post('id');
            $sql = "SELECT * FROM `images` WHERE id_image = (".$this->db->escape($id_image).")";
            $images_data =  $this->db->query($sql);
            $sql = "SELECT * FROM `like` WHERE id_image = (".$this->db->escape($id_image).")";
            $like_data = $this->db->query($sql);
            $sql = "UPDATE images SET views = views + 1 WHERE id_image = ".$this->db->escape($id_image);
            $this->db->query($sql);
            $this->load->view('header', array('title' => 'Просмотр изображения'));
            $this->load->view('image',array('images_data' => $images_data,'like_data' => $like_data));
            $this->load->view('footer');
        } else if ($id != null){
            $id_image = $id;
            $sql = "SELECT * FROM `images` WHERE id_image = (".$this->db->escape($id_image).")";
            $images_data = $this->db->query($sql);
            $sql = "SELECT * FROM `like` WHERE id_image = (".$this->db->escape($id_image).")";
            $like_data = $query = $this->db->query($sql);
            $sql = "UPDATE images SET views = views + 1 WHERE id_image = ".$this->db->escape($id_image);
            $this->db->query($sql);
            $this->load->view('header', array('title' => 'Просмотр изображения'));
            $this->load->view('image',array('images_data' => $images_data,'like_data' => $like_data));
            $this->load->view('footer');
        } else echo 'Не введён id';
    }

    private function getAllByIdUser($id = null){
        if ($this->input->post('id')){
            $id_user = $this->input->post('id');
            $sql = "SELECT * FROM `images` WHERE id_user = (".$this->db->escape($id_user).")";
            $user_data = array('user_data' => $query = $this->db->query($sql));
            $this->load->view('user', $user_data);
        } else if ($id != null){
            $id_user = $id;
            $sql = "SELECT * FROM `images` WHERE id_user = (".$this->db->escape($id_user).")";
            $user_data = array('user_data' => $query = $this->db->query($sql));
            $this->load->view('user', $user_data);
        } else echo 'Не введён id';
    }


    //TODO Добавить возможность описания картинки, а то что-то не очень хорошо получается.
    //TODO либо пускай после загрузки можно будет вносить информацию к картинке
    //Загрузка изображения и создание небольшой копии. Делает запрос к бд, вставляет туда данные о картинке.
    function do_upload(){
        if($this->session->userdata('id_user') == null){
            echo 'Залогиньтесь';
        } else {
            $id_user = $this->session->userdata('id_user');
            $id_album = $this->input->post('id_album');
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '2048';
            $config['max_width']  = '2000';
            $config['max_height']  = '2000';
            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload() ) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload_form', $error);
            }
            else {
                $data = array('upload_data' => $this->upload->data());
                $file_name = array();
                //TODO можно заменить на конструкцию проще
                foreach($data as $item){
                    $file_name['file_name'] = $item['file_name'];
                }
                $sql = "INSERT INTO `images` (path, id_user, id_album) VALUES("
                       .$this->db->escape($file_name['file_name']).","
                       .(string)$this->db->escape($id_user).","
                       .$this->db->escape($id_album).")";
                $query = $this->db->query($sql);
                $config['image_library'] = 'gd2';
                $config['source_image']	= './uploads/'.$file_name['file_name'];
                $config['new_image'] = './img/mini/'.$file_name['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']	= 75;
                $config['height']	= 75;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->load->view('header', array('title' => 'Картинка загружена'));
                $this->load->view('upload_success', $data);
                $this->load->view('footer');

            }
        }
    }
    //TODO лайки можно вынести в отдельный класс

    //Лайкаем фоточки
    public function like(){
        if ($this->input->post('id_image') && $this->session->userdata('id_user') != null) {
            $id_user = $this->session->userdata('id_user');
            $id_image = $this->input->post('id_image');
            $sql = "INSERT INTO `like` (id_user, id_image) VALUES ("
                   .(string)$this->db->escape($id_user).","
                   .$this->db->escape($id_image).")";
            $query = $this->db->query($sql);
        } else echo 'Не ввели данные';
    }

    //Лайкаем фоточки ajax
    public function likeajax($id_image = null, $id_user = null){
        if ($this->input->get('id_image') && $this->input->get('id_user')) {
            $id_user = $this->input->get('id_user');
            $id_image = $this->input->get('id_image');
            $sql = "INSERT INTO `like` (id_user, id_image) VALUES ("
                .(string)$this->db->escape($id_user).","
                .$this->db->escape($id_image).")";
            $query = $this->db->query($sql);
            $sql = "UPDATE images SET likes = likes + 1 WHERE id_image =" .$this->db->escape($id_image).";";
            $query = $this->db->query($sql);
        } else echo 'Не ввели данные';
    }

    //Лайки уходят со мной
    public function unlike (){
        if ($this->input->post('id_image') && $this->session->userdata('id_user') != null) {
            $id_user = $this->session->userdata('id_user');
            $id_image = $this->input->post('id_image');
            $sql = "DELETE FROM `like` WHERE id_user = ("
                .(string)$this->db->escape($id_user)." AND id_image ="
                .(int)$this->db->escape($id_image).")";
            $query = $this->db->query($sql);
        } else echo 'Не ввели данные';
    }

    //Лайки уходят со мной ajax
    public function dislikeajax($id_image = null, $id_user = null){
        if ($this->input->get('id_image') && $this->input->get('id_user')) {
            $id_user = $this->input->get('id_user');
            $id_image = $this->input->get('id_image');
            $sql = "DELETE FROM `like` WHERE id_user = "
                .(string)$this->db->escape($id_user)." AND id_image ="
                .$this->db->escape($id_image);
            $query = $this->db->query($sql);
            $sql = "UPDATE images SET likes = likes - 1 WHERE id_image =" .$this->db->escape($id_image).";";
            $query = $this->db->query($sql);
        } else echo 'Не ввели данные';
    }

    // Выборка всех статей в виде превью
    // Деление по модулю
    public function getIntro($app = null, $page = null){
        if($this->input->get_post('sub') && $this->input->get_post('app')){
            $count = (int)$this->getCount();
            $app = (int)$this->input->get_post('app');
            $page = $this->input->get_post('page');
            $page = !empty($page) ? $page : 1;
            $skip = ($page-1) * $app;
            $sql = "SELECT * FROM `images` ORDER BY id_image LIMIT ".$this->db->escape($skip).",".$this->db->escape((int)$app);
            $images_data = array('images_data' => $query = $this->db->query($sql));
            $this->load->view('index',$images_data);
        } else if ($app != null){
            $page = !empty($page) ? $page : 1;
            $skip = ($page-1) * $app;
            $sql = "SELECT * FROM `images` ORDER BY id_image LIMIT ".$this->db->escape($skip).",".$this->db->escape((int)$app);
            $images_data = array('images_data' => $query = $this->db->query($sql));
            $this->load->view('index',$images_data);
        }else echo 'Ошибка';
    }

    //TODO после получения формировать количество страниц.
    // Посмотри в своём прошлом проекте
    //В общем берём количество записей и делим на количество записей на странице с остатком, потом округляем в большую сторону.
    //Кажется это так работает
    //Получить количество записей в таблице
    private function getCount(){
        $sql = "SELECT COUNT(*) AS `count` FROM `images`";
        $object = $this->db->query($sql);
        foreach ($object->result_array() as $row){
            return $row['count'];
        }
    }

    //Самое популярное
    public function getPopular(){
        $sql = "SELECT * FROM `images` ORDER BY views DESC";
        $images_data = array('images_data' => $query = $this->db->query($sql));
        $this->load->view('header', array('title' => 'Все картинки'));
        $this->load->view('index',$images_data);
        $this->load->view('footer');
    }

    //чуть позже подумаем над улучшением данного кода
    //Есть вот такой вариант
    //SELECT COUNT(*) FROM `table` WHERE `field_1`='value_1' UNION SELECT COUNT(*) FROM `table` WHERE `field_1`='value_2' UNION SELECT COUNT(*) FROM `table` WHERE `field_1`='value_3' ... и т.д.??? А если таких запросов 20 или еще больше, то такой запрос будет нормальным?
    //Самое лайкабельное
    public function getFavourite(){
        $sql = "SELECT * FROM `images` ORDER BY images.likes DESC";
        $images_data = array('images_data' => $query = $this->db->query($sql));
        $this->load->view('header', array('title' => 'Все картинки'));
        $this->load->view('index',$images_data);
        $this->load->view('footer');
    }
}