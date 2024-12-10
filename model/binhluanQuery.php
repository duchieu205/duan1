<?php
    class binhluanQuery {
        public $db;

        public function __construct() {
            $this->db = connectDB();
        }

        public function __destruct() {
            $this->db = NULL;
        }

        public function getBinhLuan($ma_sp) {
            try {
                $sql = "SELECT bl.BINHLUAN, kh.NAME FROM `binhluan` bl join khachhang kh on bl.MA_KH = kh.MA_KH WHERE bl.MA_SP = :ma_sp AND bl.TRANGTHAI LIKE '%Đã duyệt'";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':ma_sp', $ma_sp, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch (Exception $e) {
                return "Lỗi bình luận" . $e->getMessage();;

                }
            
        }
    }
?>