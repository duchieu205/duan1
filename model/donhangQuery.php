<?php
    class donhangQuery {
        public $db;

        public function __construct() {
            $this->db = connectDB();
        }

        public function __destruct() {
            $this->db = NULL;
        }



        public function addDonhang($ma_kh, $dia_chi, $tong_tien) {
            try {
                $sql = "INSERT INTO donhang (MA_KH, NGAYHOANTHANH, DIACHI, TONGTIEN, TRANGTHAI, GHICHU)
                        VALUES (:ma_kh, NOW(), :dia_chi, :tong_tien, 'Chờ xử lí', NULL)";
                $stmt = $this->db->prepare($sql);
        
                $stmt->bindParam(':ma_kh', $ma_kh, PDO::PARAM_INT);
                $stmt->bindParam(':tong_tien', $tong_tien, PDO::PARAM_INT);
                $stmt->bindParam(':dia_chi', $dia_chi, PDO::PARAM_STR);
                return $stmt->execute();
        
            
            } 
            catch (Exception $e) {
                echo "Lỗi tạo đơn hàng: " . $e->getMessage();
                return $e->getMessage();
            }
        }

        public function addDonHangChiTiet($ma_donhang, $ma_sp, $soluong, $gia_sp) {
            try {
                $sql = "INSERT INTO `donhang_chitiet` (MA_DONHANG, MA_SP, THANHTOAN, SOLUONG, GIA_SP)
                VALUES (:ma_donhang, :ma_sp, 'Ship COD', :soluong, :gia_sp)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    ':ma_donhang' => $ma_donhang,
                    ':ma_sp' => $ma_sp,
                    ':soluong' => $soluong,
                    ':gia_sp' => $gia_sp
                ]);
            }
            catch (Exception $e) {
                echo "Lỗi đơn hàng chi tiết: " . $e->getMessage();
                return $e->getMessage();
            }
        }


        public function getMA_KHACHHANG($ma_kh) {
            try {
                // Kiểm tra xem MA_KH đã có đơn hàng chưa
                $sql = "SELECT MA_DONHANG FROM donhang WHERE MA_KH = :ma_kh ORDER BY MA_DONHANG DESC LIMIT 1";;
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':ma_kh', $ma_kh, PDO::PARAM_INT);
                $stmt->execute();
        
                // Nếu tìm thấy đơn hàng, trả về MA_DONHANG
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['MA_DONHANG'] ?? NULL;
        
            } catch (Exception $e) {
                echo "Lỗi kiểm tra và tạo đơn hàng: " . $e->getMessage();
                return $e->getMessage();
            }
        }

        public function getDonHangChiTiet($ma_donhang) {
            try {
                        $sql = "SELECT sp.TEN_SP, sp.ANH_SP, dh_chitiet.MA_DONHANG, dh_chitiet.MA_SP, 
                            dh_chitiet.THANHTOAN, dh_chitiet.SOLUONG, dh_chitiet.GIA_SP, 
                            (dh_chitiet.SOLUONG * dh_chitiet.GIA_SP) as total_price
                        FROM `donhang` dh
                        JOIN `donhang_chitiet` dh_chitiet on dh_chitiet.MA_DONHANG = dh.MA_DONHANG
                        JOIN `sanpham` sp ON sp.MA_SP = dh_chitiet.MA_SP
                        WHERE dh.MA_DONHANG = :ma_donhang";

                        $stmt = $this->db->prepare($sql);
  
     
                        $stmt->bindParam(':ma_donhang', $ma_donhang, PDO::PARAM_INT);

                        // Thực thi và lấy kết quả
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        return $result;
            }
            catch (Exception $e) {
                echo "Lỗi đơn hàng chi tiết: " . $e->getMessage();
                return $e->getMessage();
            }
        }
        
        public function getDonHangChiTiet1($ma_donhang) {
            try {
                $sql = "SELECT * FROM `donhang`
                WHERE `MA_DONHANG` = $ma_donhang";
                return $this->db->query($sql)->fetch();
            }
            catch (Exception $e) {
                echo "Lỗi đơn hàng: " . $e->getMessage();
                return $e->getMessage();
            }
        }

        public function getDonHang($ma_kh) {
            try {
                $sql = "SELECT * FROM `donhang`
                WHERE `MA_KH` = $ma_kh ORDER BY `MA_DONHANG` DESC";
                return $this->db->query($sql)->fetchAll();
            }
            catch (Exception $e) {
                echo "Lỗi đơn hàng: " . $e->getMessage();
                return $e->getMessage();
            }
        }

        public function huydon($ma_donhang, $ghichu) {
            try {
                $sql = "UPDATE `donhang` SET GHICHU = '$ghichu', TRANGTHAI = 'Đã hủy' WHERE MA_DONHANG = '$ma_donhang'";
                return $this->db->exec($sql);
            }
            catch (Exception $e) {
                echo "Lỗi đơn hàng: " . $e->getMessage();
                return $e->getMessage();
            }
        }

        public function getTrangThaiDonHang($ma_kh) {
            try {
                $sql = "SELECT TRANGTHAI FROM donhang WHERE MA_DONHANG = '$ma_kh'";
                return $this->db->query($sql)->fetch();
            }
            catch (Exception $e) {
                echo "Lỗi đơn hàng: " . $e->getMessage();
                return $e->getMessage();
            }
        }

        

       

        
    }
?>