<?php
    include "DbConnect.php";

    class EditManager {
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
        EditManager::edit($data);
       }

       public function edit($contact) {
            $this->stmt = $this->db->getConn()->prepare("UPDATE contacts SET firstName = ?, lastName = ?, phoneNumber = ?, email = ?, address = ?, city = ?, postalCode = ?, birthday = ? WHERE id = ?");
            $this->stmt->bind_param("sssssssss", $a, $b, $c, $d, $e, $f, $g, $h, $i);
            $a = $contact['firstName'];
            $b = $contact['lastName'];
            $c = $contact['phone'];
            $d = $contact['email'];
            $e = $contact['address'];
            $f = $contact['city'];
            $g = $contact['postalCode'];
            $h = $contact['DOB'];
            $i = $contact['id'];
            $this->stmt->execute();
            $this->stmt->close();
       }
    }

?>