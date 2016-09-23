<?php
class Subscription extends CI_Controller{

    //TODO заменить post на get_post, пример : $this->input->get_post('id_image', TRUE)
    //TODO проверки, кучу проверок.
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
            $sql = "SELECT * FROM subscribers JOIN users LEFT OUTER JOIN images USING (id_image) WHERE subscribers.id_user =".(string)$this->db->escape($id_user).
                   " AND users.id_user = subscribers.id_subscriber";
            $query = $this->db->query($sql);
            $sql = "SELECT * FROM messages WHERE id_user =".(string)$this->db->escape($this->session->userdata('id_user')).
                   " OR id_companion =".(string)$this->db->escape($this->session->userdata('id_user'));
            $query2 = $this->db->query($sql);
            $this->load->view('header', array('title' => 'Подписчики'));
            $this->load->view('subscribe', array('object' => $query, 'messages' => $query2));
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
            $sql = "SELECT * FROM `subscribers` JOIN `users` JOIN `images`  WHERE subscribers.id_subscriber ="
                   .(string)$this->db->escape($id_user).
                   " AND users.id_user = subscribers.id_user AND images.image_data > subscribers.data ORDER BY images.id_image DESC;";
            //Можно создать событие и каждое добовление, лайк, репост, подписку отображать там, в таком случае будет лёгкий запрос
            $query = $this->db->query($sql);
            //Запрос для получения лайков
            //Не доверяй этому запросу, он коварен
            //Также получаем информацию о картинке, будем верить, что нужной картинке
            $sql2 = "SELECT * FROM `subscribers` LEFT OUTER JOIN images USING (id_user) JOIN `like` JOIN `users` WHERE subscribers.id_subscriber ="
                    .(string)$this->db->escape($id_user).
                    "AND users.id_user = subscribers.id_user AND like.like_data > subscribers.data ORDER BY like.id_like DESC";
            //Запрос для получения репостов, но т.к. самих репостов пока нет, нету и запроса. Он тоже будет тяжёлым D.

            $query2 = $this->db->query($sql2);
            //$sql3 = "";
            $this->load->view('header', array('title' => 'Подписки'));
            $this->load->view('news', array('images_data' => $query, 'like_data' => $query2));
            $this->load->view('footer');
        } else echo 'Залогиньтесь';
    }

    //Довольно сложно можно для начала разбить на 3 подвида, а затем уже как-то объеденять их.
    //Да и юзерам будет немного удобней смотреть что-то отдельное т.к. не будет каши в голове.
    //Правда заказчики могут не одобрить
    //Также рассмотрим вариант array_merge() в файле написана подсказка
}