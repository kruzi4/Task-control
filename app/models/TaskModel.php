<?php
    require 'DB.php';

    class TaskModel {
        private $title;
        private $text;
        private $user_name;
        private $user_email;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($title, $text, $user_name, $user_email) {
            $this->title = $title;
            $this->text = $text;
            $this->user_name = $user_name;
            $this->user_email = $user_email;
        }

        public function validForm() {
            if(isset($_POST['title'])) {
                if(strlen($this->title) < 5)
                    return "Заглавие должно быть длиннее 5 символов";
                else if(strlen($this->text) < 10)
                    return "Задача должна содержать минимум 10 символов";
                else if($this->user_name == "")
                    return "Введите имя!";
                else if($this->user_email == "")
                    return "Введите email!";
                else
                    return "Верно";
            }
        }

        public function addTask() {
            $sql = 'INSERT INTO tasks(title, text, user_name, user_email, status) VALUES(:title, :text, :user_name, :user_email, :status)';
            $query = $this->_db->prepare($sql);

            $query->execute(['title' => $this->title, 'text' => $this->text, 'user_name' => $this->user_name, 'user_email' => $this->user_email, 'status' => 1]);
        }

        public function countTasks() {
            $result = $this->_db->query("SELECT `id` FROM `tasks`");
            return count($result->fetchAll(PDO::FETCH_ASSOC));
        }

        public function getTasksLimited($order, $limit, $sort_type = '') {
         $result = $this->_db->query("SELECT * FROM `tasks` ORDER BY $order DESC LIMIT $limit");
         return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOneTask($id) {
            $result = $this->_db->query("SELECT * FROM `tasks` WHERE `id` = '$id'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function updateTask($id, $title, $text, $name, $email, $status = 1) {
            $sql = "UPDATE `tasks` SET
                `title` = '$title',
                `text` = '$text',
                `user_name` = '$name',
                `user_email` = '$email',
                `status` = '$status'
                WHERE `tasks`.`id` = '$id'";
            $query = $this->_db->prepare($sql);

            $query->execute();
        }

        public function updateTaskStatus($id, $status) {
            $sql = "UPDATE `tasks` SET
                `status` = '$status'
                WHERE `tasks`.`id` = '$id'";
            $query = $this->_db->prepare($sql);

            $query->execute();
        }
    }
