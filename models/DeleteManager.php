<?php
    include "DbConnect.php";
    

    class DeleteManager {
        private $db;
        private $stmt;

        public function __construct() {
            include "../db.config.php";
            session_start();
            $this->db = new DbConnect($config['server'], $config['user'], $config['password'], $config['database']);
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