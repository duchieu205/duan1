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
            include("view/admin.php");
        }

        public function delete($id) {
            $result = $this->queryControl->deleteProduct($id);
            header("Location: ?act=product");
            exit();
        }

        public function listProduct() {
            $result = $this->queryControl->listProduct();
            include("view/product.php");
        }

        public function update($id) {
            $result = $this->queryControl->findProduct($id);
            $thongBao = "";
            if (isset($_POST['btn'])) {
                $result->name = $_POST['name'];
                $result->mota = $_POST['mota'];
                $result->gia = $_POST['gia'];
                $result->soluong = $_POST['soluong'];

                if (isset($_FILES['file_upload']) && $_FILES['file_upload']['tmp_name'] !== false) {
                    $img = $_FILES['file_upload']['tmp_name'];
                    $location = "../img/" . $_FILES['file_upload']['name'];
                    if (move_uploaded_file($img, $location)) {
                        $result->image = "img/" . $_FILES['file_upload']['name'];
                    }
                } 
                $return = $this->queryControl->updateProduct($result);
                if ($return = "success") {
                    $thongBao = "Cập nhật thành công";
                }
            }
            include("view/update.php");
        }

        public function create() {
            $result = $this->queryControl->findProduct($id);
            $thongBao = "";
            if (isset($_POST['btn'])) {
                $result->name = $_POST['name'];
                $result->mota = $_POST['mota'];
                $result->gia = $_POST['gia'];
                $result->soluong = $_POST['soluong'];

                if (isset($_FILES['file_upload']) && $_FILES['file_upload']['tmp_name'] !== false) {
                    $img = $_FILES['file_upload']['tmp_name'];
                    $location = "../img/" . $_FILES['file_upload']['name'];
                    if (move_uploaded_file($img, $location)) {
                        $result->image = "img/" . $_FILES['file_upload']['name'];
                    }
                } 
                $return = $this->queryControl->updateProduct($result);
                if ($return = "success") {
                    $thongBao = "Cập nhật thành công";
                }
            }
            include("view/create.php");
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