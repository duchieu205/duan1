<?php
    class CartQuery {
        private $db;
    
        public function __construct() {
            $this->db =  connectDB();
        }

        // public function getIdKhachhang() {
        //     try {
        //         $sql = "SELECT `MA_KH` FROM `khachhang` LIMIT 1";
        //         $data = $this->db->query($sql)->fetchColumn();
        //         return $data;
        //     }
        //     catch (Exception $e) {
        //         return $e->getMessage();
        //     }
        // }
        public function mycart() {
            try {
                $ma_kh = $_SESSION['ma_kh'];
                $sql = "SELECT sp.TEN_SP, sp.GIA_SP, sp.ANH_SP FROM `giohang_item` gh  join `sanpham` sp on gh.MA_SP = sp.MA_SP WHERE `MA_KH` = $ma_kh";
                $result = $this->db->query($sql)->fetchAll();
                return $result;
            } 
            catch (Exception $e) {
                return $e->getMessage();
            }
        }
        

        
        
        }

        

    
    
?>