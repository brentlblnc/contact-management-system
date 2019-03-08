<?php
    include "DbConnect.php";

    class DeleteManager {
        private $db;
        private $stmt;

        public function __construct() {
            session_start();
            $this->db = new DbConnect("localhost", "root", "", "cms");
        }

        public function delete($contact) {
            $this->stmt = $this->db->getConn()->prepare("DELETE FROM contacts WHERE id = ?");
            $this->stmt->bind_param("s", $id);
            $id = $contact['id'];
            $this->stmt->execute();
            $this->stmt->close();
        }
    }

?>