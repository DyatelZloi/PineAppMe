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
    public function subscribe($id_v_user = null, $id_user = null){
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
        }
        if($id_user != null){
            $id_subscriber = $this->session->userdata('id_user');
            $sql = "INSERT INTO `subscribers` (id_user, id_subscriber) VALUES("
                   .(string)$this->db->escape($id_user).","
                   .(string)$this->db->escape($id_subscriber).")";
            $query = $this->db->query($sql);
            $this->load->view('header');
            $this->load->view('subscribe_success');
            $this->load->view('footer');
        }
    }

    //Отписываемся от других
    public function unsubscribe($id_v_user = null, $id_user = null){
        if ($this->input->post('id_user') && $this->session->userdata('id_user') != null){
            $id_subscriber = $this->session->userdata('id_user');
            $id_user = $this->input->post('id_user');
            $sql = "DELETE FROM `subscribers` WHERE id_subscriber ="
                   .(string)$this->db->escape($id_subscriber).
                   " AND id_user =".(string)$this->db->escape($id_user);
            $this->db->query($sql);
        } else echo 'Не ввели данные';
    }

    //Мы можем возвращать html код, чтобы его потом не парсить, а просто выводить в нужном месте
    //Подписка Ajax
    public function subscribeAjax(){
        $sql = "INSERT INTO `subscribers` (id_user, id_subscriber) VALUES(".$this->db->escape((string)$this->input->get('id_user')).", "
               .$this->db->escape((string)$this->input->get('id_sub')).")";
        if($this->db->query($sql) == true) {
            echo '<a href="#" onclick="unsub(' . "'" . $this->session->userdata('id_user') . "'" . ')">Отписаться<i class="fa fa-times" aria-hidden="true"></i></a>';
        }
    }

    //Мы можем возвращать html код, чтобы его потом не парсить, а просто выводить в нужном месте
    //Отписка Ajax
    public function unsubscribeAjax(){
        $sql = "DELETE FROM `subscribers` WHERE id_subscriber = ".$this->db->escape((string)$this->input->get('id_sub')).
               " AND id_user = ".$this->db->escape((string)$this->input->get('id_user'));
        if($this->db->query($sql) == true){
            echo '<a href="#" onclick="sub('."'".$this->session->userdata('id_user')."'".')"> Подписаться<i class="fa fa-plus" aria-hidden="true"></i></a>';
        }
    }

    // Получаем всех подписавшихся с помощью аджакса
    public function getAllSubcribersAjax(){
        $sql = "SELECT * FROM subscribers JOIN users WHERE subscribers.id_user =".(string)$this->db->escape($this->input->get('id_user')).
               " AND users.id_user = subscribers.id_subscriber";
        $query = $this->db->query($sql);
        $allSubscribers = array();
        $subscriber = array();
        foreach($query->result_array() as $row){
            $subscriber['id_user'] = $row['id_user'];
            array_push($allSubscribers, $subscriber);
        }
        echo json_encode($allSubscribers);
    }

    //TODO подумать. Он выполняется даже если нет никаких записей в бд. Возвращает при этом пустые строки. Можно просто выводить подписаться, а если что-то есть, отписываемя.
    //Отлично, оно проверяет подписаны или нет.
    public function chekSub(){
        $sql = "SELECT COUNT(*) AS `count` FROM subscribers WHERE subscribers.id_subscriber = ".(string)$this->db->escape($this->input->get('id_sub')).
               " AND subscribers.id_user = ".(string)$this->db->escape($this->input->get('id_user'));
        $object = $this->db->query($sql);
        foreach($object->result_array() as $row){
            if ($row['count'] != '0'){
                echo '<a href="#" onclick="unsub('."'".$this->session->userdata('id_user')."'".')">Отписаться<i class="fa fa-times" aria-hidden="true"></i></a>';
            } else if ($row['count'] == '0') {
                echo '<a href="#" onclick="sub('."'".$this->session->userdata('id_user')."'".')"> Подписаться<i class="fa fa-plus" aria-hidden="true"></i></a>';
            }
        }
    }

    //Получить всех, кто подписался на нас
    public function getAllSubcribers($id_user = null){
        if ($this->input->post('id_user')){
            $id_user = $this->input->post('id_user');
            $sql = "SELECT * FROM subscribers JOIN users LEFT OUTER JOIN images USING (id_image) WHERE subscribers.id_user =".(string)$this->db->escape($id_user).
                   " AND users.id_user = subscribers.id_subscriber";
            $query = $this->db->query($sql);
            $sql = "SELECT * FROM messages WHERE id_user =".(string)$this->db->escape($this->session->userdata('id_user')).
                   " OR id_companion =".(string)$this->db->escape($this->session->userdata('id_user'));
            $query2 = $this->db->query($sql);
            $this->load->view('subscribe', array('object' => $query, 'messages' => $query2));
        }
        if($id_user != null){
            $sql = "SELECT * FROM `users` LEFT OUTER JOIN `images` USING (id_image) WHERE users.id_user = ".(string)$this->db->escape($id_user);
            $object = $this->db->query($sql);
            $sql = "SELECT * FROM images WHERE id_user =".(string)$this->db->escape($id_user);
            $images = $this->db->query($sql);
            $sql = "SELECT COUNT(*) AS count FROM images WHERE images.id_user = ".(string)$this->db->escape($id_user);
            $images_count =  $this->db->query($sql);
            $sql = "SELECT COUNT(*) AS count FROM subscribers WHERE id_user = ".(string)$this->db->escape($id_user);
            $sub_count = $query = $this->db->query($sql);
            $sql = "SELECT COUNT(*) AS count FROM subscribers WHERE id_subscriber = ".(string)$this->db->escape($id_user);
            $u_sub =  $this->db->query($sql);
            $sql = "SELECT COUNT(*) AS count FROM albums WHERE id_user = ".(string)$this->db->escape($id_user);
            $albums =  $this->db->query($sql);
            $sql = "SELECT path, users.id_user, name FROM subscribers JOIN users LEFT OUTER JOIN images USING (id_image) WHERE subscribers.id_user =".(string)$this->db->escape($id_user).
                   " AND users.id_user = subscribers.id_subscriber";
            $query = $this->db->query($sql);
            $this->load->view('subscribe', array('query' => $query, 'object' => $object, 'images' => $images, 'img_count' => $images_count, 'sub_count' => $sub_count, 'u_sub' => $u_sub, 'albums' => $albums));
        }
    }

    //Получить всех, на кого подписаны мы
    public function getAllSubscription($id_user = null){
        if ($this->input->post('id_user')){
            $id_user = $this->input->post('id_user');
            $sql = "SELECT * FROM subscribers JOIN users WHERE subscribers.id_subscriber =".(string)$this->db->escape($id_user).
                   "AND users.id_user = subscribers.id_user";
            $query = $this->db->query($sql);
            $this->load->view('header', array('title' => 'Подписки'));
            $this->load->view('subscription', array('query' => $query));
            $this->load->view('footer');
        }
        if($id_user != null){
            $sql = "SELECT * FROM `users` LEFT OUTER JOIN `images` USING (id_image) WHERE users.id_user = ".(string)$this->db->escape($id_user);
            $object = $query = $this->db->query($sql);
            $sql = "SELECT * FROM images WHERE id_user =".(string)$this->db->escape($id_user);
            $images = $query = $this->db->query($sql);
            $sql = "SELECT COUNT(*) AS count FROM images WHERE images.id_user = ".(string)$this->db->escape($id_user);
            $images_count = $query = $this->db->query($sql);
            $sql = "SELECT COUNT(*) AS count FROM subscribers WHERE id_user = ".(string)$this->db->escape($id_user);
            $sub_count = $query = $this->db->query($sql);
            $sql = "SELECT COUNT(*) AS count FROM subscribers WHERE id_subscriber = ".(string)$this->db->escape($id_user);
            $u_sub = $query = $this->db->query($sql);
            $sql = "SELECT COUNT(*) AS count FROM albums WHERE id_user = ".(string)$this->db->escape($id_user);
            $albums = $query = $this->db->query($sql);
            $sql = "SELECT path, users.id_user, name FROM subscribers JOIN users LEFT OUTER JOIN images USING (id_image) WHERE subscribers.id_subscriber =".(string)$this->db->escape($id_user).
                   "AND users.id_user = subscribers.id_user";
            $query = $this->db->query($sql);
            $this->load->view('subscription', array('query' => $query, 'object' => $object, 'images' => $images, 'img_count' => $images_count, 'sub_count' => $sub_count, 'u_sub' => $u_sub, 'albums' => $albums));
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
}

