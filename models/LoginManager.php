<?php
    include "DbConnect.php";
    

    class LoginManager {
        private $db;
        private $stmt;
        private $result;
        private $output;
        private $passwordCheck;

        public function __construct() {
            include "../db.config.php";
            $this->db = new DbConnect($config['server'], $config['user'], $config['password'], $config['database']);
        }

        public function authenticate($data) {
            foreach ($data as $key => $val) {
                $data[$key] = trim($data[$key]);
                $data[$key] = stripslashes($data[$key]);
                $data[$key] = htmlspecialchars($data[$key]);
            }

            $this->stmt = $this->db->getConn()->prepare("SELECT password FROM login WHERE username = ?");
            $this->stmt->bind_param("s", $username);
            $username = $data['username'];
            $this->stmt->execute();
            $this->stmt->store_result();
            $this->stmt->bind_result($pwd);
            $this->stmt->fetch();
            
            $this->passwordCheck = password_verify($data['password'], $pwd);
            return $this->passwordCheck == false ? false : true;
            
            $this->stmt->close();
        }
    }

    $loginManager = new LoginManager();
?>