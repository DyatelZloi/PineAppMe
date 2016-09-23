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

    //Система событий это явный головняк, если так подумать, но пока будем реализовывать, ибо надо сделать план б, на тот
    //случай, если у меня не получится как-то реализовать или уговорить на ту реализацию, которая есть.

    //Не забывай, что с чатом может быть большая беда

    //Всё бы хорошо, но события бывают разными...
    //Добавление картинки, лайк или подписка...
    //События также придётся удалять...
    //Можно конечно разделить на три поля, но насколько это правильно? Два будут всегда пустовать, а по одному будем проверять
    //Даже не два, а три.
    //Можно конечно попробовать придумать какую-то суперсвязь, но реально ли это?
    //Здравые мысли по тому как это реализовать
    //По идее всё подсоединения должны быть LEFT OUTER JOIN т.к. они могут быть нулевыми, точнее лайки, репосты и картинки. Юзер всё также NATURAL JOIN т.к. это поле не должно быть пустым. Дальше мы должны будем проверять поля, не пусты ли они...
    //Пока получается вот такой запрос
    //SELECT * FROM `subscribers` NATURAL JOIN `users` LEFT OUTER JOIN `images` USING (id_user) LEFT OUTER JOIN `like` USING (id_user) LEFT OUTER JOIN `repost` USING (id_user) WHERE subscribers.id_subscriber ='google' AND users.id_user = subscribers.id_user AND images.image_data > subscribers.data ORDER BY images.id_image DESC;
    //Запрос преобразуется в вот такой, но в таком случае мы получаем только значения у которых есть повторения
    //SELECT * FROM `subscribers` NATURAL JOIN `users` LEFT OUTER JOIN `images` USING (id_user) LEFT OUTER JOIN `like` USING (id_user) LEFT OUTER JOIN `repost` USING (id_user) WHERE subscribers.id_subscriber ='google' AND users.id_user = subscribers.id_user AND images.image_data > subscribers.data OR subscribers.id_subscriber ='google' AND users.id_user = subscribers.id_user AND like.like_data > subscribers.data;
    //Сделать такой запрос действительно сложно, наверное лучше реализовать это раздельно, либо
    //Хмм, он ему помогает, это не честно D. Хотя все иногда нуждаются в помощи.
    //Ещё можно тупо после трёх запросов попробовать поместить всё содержимое в один массив, а затем просто сортировать по какому-то полю.
    //Пока правда это всё довольно проблемно по реализации, возможно это сказываются сжатые сроки, из-за которых пострадала проектировка проекта
    //Ведь приходилось тупо программировать не особо задумываясь об архитектуре и возможных проблем с архитектурой

}
