<?php
    class userControl {
        public $userControl;

        public function __construct() {
            $this->userControl = new userQuery;
        }

        public function __destruct() {
            $this->userControl = NULL;
        }

        public function user() {
            $result = $this->userControl->listUser();
            include("view/user/user.php");
        }
    
        public function deleteUser($id) {
            $result = $this->userControl->deleteUser($id);
            header("Location: ?act=user");
            exit();
        }

        public function logout() {
            session_start();
            session_destroy();
            session_destroy();
            header("Location: ../");
            exit();
        }
        
    }
    
    
?>