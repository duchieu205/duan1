<?php
    class donhangQuery {
        public $db;

        public function __construct() {
            $this->db = connectDB();
        }

        public function __destruct() {
            $this->db = NULL;
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
                            (dh_chitiet.SOLUONG * dh_chitiet.GIA_SP) as total_price,
                            dh.TRANGTHAI
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

        public function getDonHang() {
            try {
                $sql = "SELECT * FROM `donhang` ORDER BY MA_DONHANG DESC";
                $result = $this->db->query($sql)->fetchAll();
                $danhSach = [];
                foreach ($result as $rs) {
                    $donhang = new donhang;
                    $donhang->ma_dh = $rs['MA_DONHANG'];
                    $donhang->ma_kh = $rs['MA_KH'];
                    $donhang->ngayhoanthanh = $rs['NGAYHOANTHANH'];
                    $donhang->diachi = $rs['DIACHI'];
                    $donhang->tong = $rs['TONGTIEN'];
                    $donhang->trangthai = $rs['TRANGTHAI'];
                    $donhang->ghichu = $rs['GHICHU'];
                    $danhSach[] = $donhang;
                }
                return $danhSach;
            }
            catch (Exception $e) {
                echo "Lỗi đơn hàng: " . $e->getMessage();
                return $e->getMessage();
            }
        }


        public function getTrangThaiDonHang($ma_donhang) {
            try {
                $sql = "SELECT MA_DONHANG, MA_KH, TRANGTHAI FROM `donhang` WHERE `MA_DONHANG` = $ma_donhang";
                return $this->db->query($sql)->fetch();
            }
            catch (Exception $e) {
                echo "Lỗi đơn hàng: " . $e->getMessage();
                return $e->getMessage();
            }
        }

        public function updateTrangThai($trangthai, $ma_dh) {
            try {
                $sql = "UPDATE `donhang` SET `TRANGTHAI` = '$trangthai'  WHERE `MA_DONHANG` = '$ma_dh'";
                return $this->db->exec($sql);
            }
            catch (Exception $e) {
                echo "Lỗi thay đổi trạng thái: " . $e->getMessage();
                return $e->getMessage();
            }
        }

        public function xacnhanTraHang($ma_dh) {
            try {
                $sql = "UPDATE `donhang` SET TRANGTHAI = 'Xác nhận Trả hàng/Hoàn tiền' WHERE MA_DONHANG = '$ma_dh'";
                return $this->db->exec($sql);
            }
            catch (Exception $e) {
                echo "Lỗi thay đổi trạng thái: " . $e->getMessage();
                return $e->getMessage();
            }
        }

        public function tuchoiTraHang($ma_dh) {
            try {
                $sql = "UPDATE `donhang` SET TRANGTHAI = 'Từ chối Trả hàng/Hoàn tiền' WHERE MA_DONHANG = '$ma_dh'";
                return $this->db->exec($sql);
            }
            catch (Exception $e) {
                echo "Lỗi thay đổi trạng thái: " . $e->getMessage();
                return $e->getMessage();
            }
        }
        
        

        
    }
?>