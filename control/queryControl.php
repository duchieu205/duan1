<?php
    class queryControl {
        public $queryControl;

        public function __construct() {
            $this->queryControl = new Query;
        }
        public function __destruct() {
            $this->queryControl = NULL;
        }

        public function list() {
            $result = $this->queryControl->listProduct();
            include("view/home.php");
        }

        public function signup() {
            $tbao = "";
            $user = new khachhang;
            if (isset($_POST['btn_submit'])) {
                $user->name = trim($_POST['name']);
                $user->email = trim($_POST['email']);
                $user->password = trim($_POST['password']);
                $user->diachi = NULL;
                $user->sdt = NULL;

                $result = $this->queryControl->signup($user);
                if ($result === "success") {
                    $tbao = "Đăng ký thành công";
                }
                else {
                    $tbao = "Đăng ký thất bại";
                }
            }
            include "view/signup.php";
        }
        public function chitiet($id) {
            $list = $this->queryControl->chitietProduct($id);
            var_dump($list);
            include("view/chitietsp.php");
        }
    }
?>