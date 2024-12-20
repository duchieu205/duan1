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
                    $sanpham->ma_sp = $rs['MA_SP'];
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


        public function signup(khachhang $kh) {
            try {
                $sql = "INSERT INTO `khachhang` (`MA_KH`, `NAME`, `EMAIL`, `MATKHAU`, `DIACHI`, `SDT`) 
                VALUES (NULL, '$kh->name', '$kh->email', '$kh->password', '', '');";
                $data = $this->pdo->exec($sql);
                if ($data === 1) {
                    return "success";
                }
            }
            catch (Exception $e) {
                echo "Lỗi đăng ký" . $e->getMessage();
            }
        }

        public function chitietProduct($id) {
            try {
                $sql = "SELECT * FROM `sanpham` WHERE `MA_SP` = $id";
                $rs = $this->pdo->query($sql)->fetch();
                $result = [];
                    $sanpham = new sanpham;
                    $sanpham->ma_sp= $rs['MA_SP'];
                    $sanpham->name = $rs['TEN_SP'];
                    $sanpham->mota = $rs['MOTA_SP'];
                    $sanpham->gia = $rs['GIA_SP'];
                    $sanpham->soluong = $rs['SOLUONG_SP'];
                    $sanpham->image = $rs['ANH_SP'];
                    $sanpham->ma_th = $rs['MA_THUONGHIEU'];
                    $sanpham->trangthai = $rs['TRANGTHAI'];
                    $result[] = $sanpham;
                return $result;

            }
            catch (Exception $e) {
                echo "Lỗi chi tiết sản phẩm" . $e->getMessage();
            }
        }

        public function updateSoLuongSanPham($ma_sp, $soluong) {
            try {
                $sql = "UPDATE `sanpham` SET `SOLUONG_SP` = SOLUONG_SP - '$soluong' WHERE `MA_SP` = '$ma_sp'";
                return $this->pdo->exec($sql);
            }
            catch (Exception $e) {
                echo "Lỗi update số lượng sản phẩm" . $e->getMessage();
            }
        }

        public function listUser() {
            try {
                $sql = "SELECT * FROM `khachhang`";
                $data = $this->pdo->query($sql)->fetchAll();
                $userlist = [];
                foreach ($data as $ds) {
                    $user = new khachhang;
                    $user->ma_kh = $ds['MA_KH'];
                    $user->name = $ds['NAME'];
                    $user->email = $ds['EMAIL'];
                    $user->password = $ds['MATKHAU'];
                    $user->diachi = $ds['DIACHI'];
                    $user->sdt = $ds['SDT'];
                    $userlist[] = $user;
                }
                return $userlist;
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }

?>