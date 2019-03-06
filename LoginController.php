<?php
    include "LoginManager.php";

    class LoginController {
        private $loginManager;

        public function __construct() {
            $this->loginManager = new LoginManager();
            //echo "Controller instantiated";
            LoginController::login();
        }

        public function login() {
            if ($this->loginManager->verifyLogin()) {
                // begin session
                header("Location: index.php");
            } 
        }


    }

    $loginController = new LoginController();
    //$loginController->login();
    
?>