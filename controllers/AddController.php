<?php
    include "../models/AddManager.php";

    class AddController {
        private $addManager;

        public function __construct() {
            $this->addManager = new AddManager();
            AddController::addContact($_POST);
        }

        public function addContact($data) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->addManager->validate($data);
                header("Location: ../index.php");
            }
        }
    }

    $addController = new AddController();

?>