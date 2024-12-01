<?php
    class CartQuery {
        private $db;
    
        public function __construct() {
            $this->db =  connectDB();
        }
        public function mycart() {
            try {
                $ma_kh = $_SESSION['ma_kh'];
                $sql = "SELECT gh.MA_GIOHANGITEM, gh.SOLUONG, gh.MA_GIOHANGITEM, sp.TEN_SP, sp.GIA_SP, sp.ANH_SP, gh.MA_DONHANG, gh.SOLUONG * sp.GIA_SP as total_price 
                FROM `giohang_item` gh  join `sanpham` sp on gh.MA_SP = sp.MA_SP WHERE `MA_KH` = $ma_kh";
                $result = $this->db->query($sql)->fetchAll();
                return $result;
            } 
            catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function addCart($ma_sp, $ma_kh, $ma_donhang, $soluong) {
            try {
                $sql = "INSERT INTO giohang_item (MA_SP, MA_KH, MA_DONHANG, SOLUONG) VALUES (:ma_sp, :ma_kh, :ma_donhang, :soluong)";
                $stmt = $this->db->prepare($sql);
                
                // Gán giá trị cho các tham số
                $stmt->bindParam(':ma_sp', $ma_sp, PDO::PARAM_INT);
                $stmt->bindParam(':ma_kh', $ma_kh, PDO::PARAM_INT);
                $stmt->bindParam(':ma_donhang', $ma_donhang, PDO::PARAM_INT);
                $stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
                // Thực thi câu lệnh
                $stmt->execute();

            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function checkCart($ma_kh, $ma_sp) {
            // SQL hoặc logic lấy thông tin sản phẩm trong giỏ hàng
            try {
            $sql = "SELECT * FROM giohang_item WHERE ma_kh = ? AND ma_sp = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ma_kh, $ma_sp]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function updateSoLuong($ma_kh, $ma_sp, $newSoLuong) {
            try {
                $sql = "UPDATE giohang_item SET SOLUONG = ? WHERE ma_kh = ? AND ma_sp = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$newSoLuong, $ma_kh, $ma_sp]);
            }

            catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function deleteCart($id) {
            try {
                $sql = "DELETE FROM giohang_item WHERE `MA_GIOHANGITEM` = $id";
                $data = $this->db->exec($sql);
                return $data;
            }

            catch (Exception $e) {
                return $e->getMessage();
            }
        }
        

        
        
        }

        

    
    
?>