<?php
    include "DeleteManager.php";

    class DeleteController {
        private $deleteManager;

        public function __construct() {
            if ($_POST['delete'] == '1') {
                DeleteController::delete();
            }

            if ($_POST['deleteSubmit'] == '1') {
                $this->deleteManager = new DeleteManager();
                DeleteController::deleteSubmit();
            }
        }

        public function delete() {
            session_start();
            $_SESSION['contact'] = $_POST;
            header("Location: deleteContact.php");
        }

        public function deleteSubmit() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->deleteManager->delete($_SESSION['contact']);
                header("Location: index.php");
            }
        }

        
    }

    $deleteController = new DeleteController();

?>