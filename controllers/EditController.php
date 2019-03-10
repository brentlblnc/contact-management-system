<?php
    include "../models/EditManager.php";

    class EditController {
        private $editManager;

        public function __construct() {
            if ($_POST['edit'] == '1') {
                EditController::edit();
            }

            if ($_POST['editSubmit'] == '1') {
                $this->editManager = new EditManager();
                EditController::editSubmit($_POST);
            }
        }

        public function edit() {
            session_start();
            $_SESSION['editContact'] = $_POST;

            header("Location: ../views/editContact.php");
        }

        public function editSubmit($data) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->editManager->validate($data);
                header("Location: ../index.php");
            }
        }
    }

    $editController = new EditController();

?>