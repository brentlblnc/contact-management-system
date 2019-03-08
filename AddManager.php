<?php
    include "DbConnect.php";

    class AddManager {
        private $db;
        private $stmt;

        public function __construct() {
            $this->db = new DbConnect("localhost", "root", "", "cms");
        }

        public function validate($data) {
            foreach ($data as $key => $val) {
                $data[$key] = trim($data[$key]);
                $data[$key] = stripslashes($data[$key]);
                $data[$key] = htmlspecialchars($data[$key]);
            }
            AddManager::add($data);
        }

        public function add($contact) {
            $this->stmt = $this->db->getConn()->prepare("INSERT INTO contacts (firstName, lastName, phoneNumber, email, address, city, province, postalCode, birthday) VALUES (?,?,?,?,?,?,?,?,?)");
            $this->stmt->bind_param("sssssssss", $a, $b, $c, $d, $e, $f, $g, $h, $i);
            $a = $contact['firstName'];
            $b = $contact['lastName'];
            $c = $contact['phone'];
            $d = $contact['email'];
            $e = $contact['address'];
            $f = $contact['city'];
            $g = $contact['province'];
            $h = $contact['postalCode'];
            $i = $contact['DOB'];
            $this->stmt->execute();
            $this->stmt->close();
        }
    }

    $addManager = new AddManager();


?>