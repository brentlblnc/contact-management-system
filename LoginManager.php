<?php
    include "DbConnect.php";
    class LoginManager {
        private $db;
        private $stmt;
        private $result;
        private $passwordCheck;

        public function __construct() {
            $this->db = new DbConnect("localhost", "root", "", "cms");
        }

        public function authenticate($data) {
            foreach ($data as $key => $val) {
                $data[$key] = trim($data[$key]);
                $data[$key] = stripslashes($data[$key]);
                $data[$key] = htmlspecialchars($data[$key]);
            }
            $this->username = $data['username'];
            $this->password = $data['password'];

            $this->stmt = $this->db->getConn()->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
            $this->stmt->bind_param("ss", $username, $password);
            $username = $data['username'];
            $password = $data['password'];
            $this->stmt->execute();
            $this->stmt->store_result();
            $count = $this->stmt->num_rows;
            $this->stmt->fetch();
            //$this->result = mysqli_stmt_fetch($this->stmt);
            if ($count == 1) {
                // $this->passwordCheck = password_verify($password, $row['password']);
                // if ($this->passwordCheck == false) {
                //     return false;
                // } else {
                //     return true;
                // }
                return true;
            } else {
                die('count '.$count);
                return false;
            }
            $this->stmt->close();
        }
    }

    $loginManager = new LoginManager();
?>