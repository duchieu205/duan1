<?php
    class Query {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {
            $this->pdo = NULL;
        }

        public function listProduct() {
            try {
                $sql = "SELECT * FROM `sanpham`";
                $result = $this->pdo->query($sql)->fetchAll();
                $array_product = [];
                foreach($result as $rs) {
                    $sanpham = new sanpham;
                    $sanpham->id = $rs['MA_SP'];
                    $sanpham->name = $rs['TEN_SP'];
                    $sanpham->mota = $rs['MOTA_SP'];
                    $sanpham->gia = $rs['GIA_SP'];
                    $sanpham->soluong = $rs['SOLUONG_SP'];
                    $sanpham->image = $rs['ANH_SP'];
                    $sanpham->ma_th = $rs['MA_THUONGHIEU'];
                    $sanpham->trangthai = $rs['TRANGTHAI'];
                    $array_product[] = $sanpham;
                }
                return $array_product;
            }

            catch (Exception $e) {
                $e->getMessage();
            }
        }
        
        public function deleteProduct($id) {
            try {
                $sql = "DELETE FROM `sanpham` WHERE `MA_SP` = $id";
                $result = $this->pdo->exec($sql);
                if ($result === 1) {
                    return "success";
                }
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }

        public function updateProduct(sanpham $rs) {
            try {
                $sql = "UPDATE `sanpham` SET `TEN_SP` = '$rs->name',
                `MOTA_SP`= '$rs->mota',
                `GIA_SP` = '$rs->gia',
                `SOLUONG_SP` = '$rs->soluong',
                `ANH_SP` = '$rs->image',
                `TRANGTHAI` = '$rs->trangthai'
                WHERE `MA_SP`= '$rs->ma_sp'";
                $result = $this->pdo->exec($sql);
                if ($result === 1 || $result === 0) {
                    return "success";
                }
                return $result;
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }

        public function createProduct(sanpham $rs) {
            try {
                $sql = "INSERT INTO `sanpham` (`MA_SP`, `TEN_SP`, `MOTA_SP`, `GIA_SP`, `SOLUONG_SP`, `ANH_SP`, `MA_THUONGHIEU`, `TRANGTHAI`) 
                VALUES (NULL, '$rs->name', '$rs->mota', '$rs->gia', '$rs->soluong', '$rs->image', '$rs->ma_th', '$rs->trangthai');";
                $data = $this->pdo->exec($sql);
                if ($data === 1) {
                    return "success";
                }
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }

        public function listCategory() {
            try {
                $sql = "SELECT * FROM `thuonghieu`";
                $data = $this->pdo->query($sql)->fetchAll();
                $result = [];
                foreach ($data as $da) {
                    $thuonghieu = new thuonghieu;
                    $thuonghieu->ma_th = $da['MA_TH'];
                    $thuonghieu->name = $da['NAME'];
                    $result[] = $thuonghieu;
                }
                return $result;
            }
            catch (Exception $e) {
                $e->getMessage();
            }
        }

        public function findProduct($id) {
            try {
                $sql = "SELECT * FROM `sanpham` WHERE `MA_SP` = '$id'";
                $rs = $this->pdo->query($sql)->fetch();
                    $sanpham = new sanpham;
                    $sanpham->ma_sp = $rs['MA_SP'];
                    $sanpham->name = $rs['TEN_SP'];
                    $sanpham->mota = $rs['MOTA_SP'];
                    $sanpham->gia = $rs['GIA_SP'];
                    $sanpham->soluong = $rs['SOLUONG_SP'];
                    $sanpham->image = $rs['ANH_SP'];
                    $sanpham->ma_th = $rs['MA_THUONGHIEU'];
                    $sanpham->trangthai = $rs['TRANGTHAI'];
                return $sanpham;
            }   
            catch (Exception $e) {
                $e->getMessage();
            }
        }
        public function countUser() {
            try {
                $sql = "SELECT COUNT(*) as totalUser FROM `khachhang`";
                $data = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
                return $data;
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function countProduct() {
            try {
                $sql = "SELECT COUNT(*) as totalProduct FROM `sanpham`";
                $data = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
                return $data;
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }
        
    }
?>