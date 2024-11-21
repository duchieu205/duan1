<?php
    class queryControl {
        public $queryControl;

        public function __construct() {
            $this->queryControl = new Query;
        }


        public function list() {
            $result = $this->queryControl->listProduct();
            include("view/admin.php");
        }

        public function listProduct() {
            include("view/product.php");
        }
        public function user() {
            include("view/user.php");
        }

        public function danhmuc() {
            include("view/danhmuc.php");
        }

        public function binhluan() {
            include("view/binhluan.php");
        }

        public function donhang() {
            include("view/donhang.php");
        }
    }
?>