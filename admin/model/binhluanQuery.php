<?php
    class binhluanQuery {
        public $db;

        public function __construct() {
            $this->db = connectDB();
        }

        public function __destruct() {
            $this->db = null;
        }

        public function getBinhLuan($ma_sp) {
            try {
                $sql = "SELECT bl.MA_BINHLUAN, bl.MA_SP, bl.NGAYBINHLUAN, bl.TRANGTHAI, bl.BINHLUAN, kh.NAME, kh.MA_KH 
                FROM `binhluan` bl join khachhang kh on bl.MA_KH = kh.MA_KH WHERE bl.MA_SP = :ma_sp";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':ma_sp', $ma_sp, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch (Exception $e) {
                return "Lỗi bình luận" . $e->getMessage();
                }
        }
       

        public function updateBinhLuan($ma_binhluan) {
            try {
                $sql = "UPDATE `binhluan` SET TRANGTHAI = 'Đã duyệt' WHERE MA_BINHLUAN = '$ma_binhluan'";
                return $this->db->exec($sql);
                $stmt->bindParam(':ma_binhluan', $ma_binhluan, PDO::PARAM_INT);
            }
            catch (Exception $e) {
                return "Lỗi sửa bình luận" . $e->getMessage();
                }
        }

    }
?>