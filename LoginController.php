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
            if (isset($_POST['loginSubmit']) && $this->loginManager->authenticate($_POST)) {
                // begin session
                session_start();
                $_SESSION['authenticated'] = true;
                header("Location: index.php");
            } else {
                header("Location: login.php");
            }
        }


    }

    $loginController = new LoginController();
    //$loginController->login();
    
?>