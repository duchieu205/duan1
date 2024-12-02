<?php
        session_start();

    class queryControl {
        public $queryControl;
        public $cartControl;
        public function __construct() {
            $this->queryControl = new Query;
            $this->cartControl = new cartQuery;
        }
        public function __destruct() {
            $this->queryControl = NULL;
        }

        public function home() {
            $result = $this->queryControl->listProduct();
            include("view/home.php");
        }

        public function list() {
            $result = $this->queryControl->listProduct();
            include("view/shop.php");
        }

        public function signup() {
            $tbao = "";
            $user1 = new khachhang;
            if (isset($_POST['btn_submit'])) {
                $user1->name = trim($_POST['name']);
                $user1->email = trim($_POST['email']);
                $user1->password = trim($_POST['password']);
                $user1->diachi = NULL;
                $user1->sdt = NULL;

                if (trim($_POST['name']) == "" || trim($_POST['email']) == "" || trim($_POST['password']) == "") {
                    $tbao = "Vui lòng nhập đầy đủ thông tin";
                }
                if (trim($_POST['name']) !== "" || trim($_POST['email']) !== "" || trim($_POST['password']) !== "") {
                    $user = $this->queryControl->listUser();
                    
                    $email = false;
                    foreach ($user as $us) {
                        if ($us->email == $_POST['email']) {
                            $email = true;
                            break;
                        }
                    }
                    if ($email) {
                        $tbao = "Email đã tồn tại";
                    }
                }
                if ($tbao == "" ) {
                    $result = $this->queryControl->signup($user1);
                if ($result === "success") {
                    $tbao = "Đăng ký thành công";
                }
                else {
                    $tbao = "Đăng ký thất bại";
                }
            }
            }
            include "view/signup.php";
        }
        public function signin() {
            $tbao = "";
            $result = $this->queryControl->listUser();
            if (isset($_POST['btn_submit'])) {
                if ($_POST['email'] == "" || $_POST['password'] == "") {
                    $tbao = "Vui lòng điền đầy đủ thông tin";
                }
                if ($_POST['email'] == "admin@gmail.com" && $_POST['password'] === "123456") {
                    session_start();
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['password'] = $_POST['password'];
                    header("Location: /duan1/admin");
                    exit();
                }
                if ($_POST['email'] !== "admin@gmail.com" && $_POST['password'] !== "123456"){
                    $user = false;
                    foreach($result as $rs) {
                        if ($_POST['email'] == $rs->email && $_POST['password'] == $rs->password) {
                            $_SESSION['ma_kh'] = $rs->ma_kh;
                            $_SESSION['email'] = $_POST['email'];
                            $_SESSION['password'] = $_POST['password'];
                            
                            header("Location: ?act=shop");
                            exit();
                        }
                    }
                }
                else {
                    $tbao = "Sai tài khoản hoặc mật khẩu.";
                }
            }
            include("view/signin.php");
        }
        // public function chitiet($id) {
        //     $list = $this->queryControl->chitietProduct($id);
        //     var_dump($list);
        //     include("view/chitietsp.php");
        // }

        public function detail($id) {
            $result = $this->queryControl->chitietProduct($id);
            include("view/chitietsanpham.php");
        }

        public function logout() {
            session_start();
            session_destroy();
            session_destroy();
            header("Location: ?act=home");
            exit();
        }
    }
?>