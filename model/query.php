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
                // echo "<pre>";
                // print_r($result);
                // echo "</pre>";
                $array_product = [];
                foreach($result as $rs) {
                    $sanpham = new sanpham;
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


    }

?>