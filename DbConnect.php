<?php
    class DbConnect {
        private $conn;
        private $host;
        private $user;
        private $password;
        private $db;

        public function __construct($host, $user, $password, $db) {
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
            $this->db = $db;

            $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db) 
                or die("Error: couldn't connect to DB.");

        }

        public function select($stmt) {
            $result = mysqli_query($this->conn, $stmt);
            return $result;
        }

        public function getConn() {
            return $this->conn;
        }

        public function insert($stmt, $vars, $data, $dataTypes) {
            // $stmt = $this->conn->prepare($stmt);
            // $stmt->bind_param($dataTypes, ...$vars);
            // for ($i = 0; $i < sizeof($vars); $i++) {
            //     $vars[$i] = $data[$i];
            // }
            // $stmt->execute();
            // $stmt->close();
            
        }

        public function update($stmt) {

        }

        public function __destruct() {
            mysqli_close($this->conn);
        }
    }
?>