<?php
    require 'DB.php';

    class UserModel {
        private $name;
        private $email;
        private $pass;
        private $re_pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($name, $email, $pass, $re_pass) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->re_pass = $re_pass;
        }

        public function validForm() {
            if(strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(strlen($this->pass) < 3)
                return "Пароль не менее 3 символов";
            else if($this->pass != $this->re_pass)
                return "Пароли не совпадают";
            else
                return "Верно";
        }

        public function addUser() {
            $sql = 'INSERT INTO users(name, email, pass, status) VALUES(:name, :email, :pass, :status)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['name' => $this->name, 'email' => $this->email, 'pass' => $pass, 'status' => "User"]);

            $this->setAuth($this->name);
        }

        public function getUser() {
            $login = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `name` = '$login'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function logOut() {
            setcookie('login', $this->login, time() - 3600, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }

        public function auth($name, $pass) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `name` = '$name'");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user['name'] == '')
                return 'Пользователя с таким логином не существует';
            else if(password_verify($pass, $user['pass']))
                $this->setAuth($name);
            else
                return 'Пароли не совпадают';
        }

        public function setAuth($login) {
            setcookie('login', $login, time() + 3600, '/');
            header('Location: /');
        }

    }
