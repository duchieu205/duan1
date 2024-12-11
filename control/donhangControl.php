<?php
    class donhangControl {
        public $donhangControl;
        public $userControl;
        public $cartControl;
        public $queryControl;
        public function __construct() {
            $this->donhangControl = new donhangQuery;
            $this->userControl = new userQuery;
            $this->cartControl = new cartQuery;
            $this->queryControl = new Query;
        }

        public function __destruct() {
            $this->donhangControl = NULL;
        }

        public function list() {
            if (isset($_POST['submit_user'])) {
                $ma_kh = $_SESSION['ma_kh'] ?? NULL;
                $this->userControl->updateUser($_POST['name'], $_POST['email'] , $_POST['diachi'], $_POST['sdt'], $ma_kh);
                $result = $this->cartControl->mycart(); // hàm lấy sản phẩm từ giỏ hàng

                $user = $this->userControl->getUser($ma_kh); // hàm lấy thông tin user
                if ($result) {
                    $total_price = 0;
                    foreach ($result as $product) {
                        if (isset($product)) {
                        $total_price += $product['total_price'];
                        }
                    }
                    $donhang = $this->donhangControl->addDonhang($ma_kh, $user['DIACHI'], $total_price); // hàm insert vào đơn hàng
                    if (!$donhang) {
                        echo "Lỗi khi thêm đơn hàng! Kiểm tra SQL hoặc tham số.";
                        exit();
                    }
                    $ma_donhang = $this->donhangControl->getMA_KHACHHANG($ma_kh); // hàm lấy mã đơn hàng khi tạo;
                    if (!$ma_donhang) {
                        echo "Không thể lấy mã đơn hàng! Kiểm tra hàm getMA_KHACHHANG.";
                        exit();
                    }
                    if ($ma_donhang) {
                    foreach ($result as $product) {
                        $ma_sp = $product['MA_SP'];
                        $soluong_sp = $product['SOLUONG'];
                        $gia_sp = $product['GIA_SP'];
                        $donhangchitiet = $this->donhangControl->addDonHangChiTiet($ma_donhang, $ma_sp, $soluong_sp, $gia_sp);
                        $this->queryControl->updateSoLuongSanPham($ma_sp, $soluong_sp);
                    }
                    }
                    else {
                        echo "Thất bại";
                    }
                    $this->cartControl->deleteALlCart($_SESSION['ma_kh']); // xóa sản phẩm trong giỏ hàng
                }
            }
            $result = $this->donhangControl->getDonHang($_SESSION['ma_kh']);
            include("view/donhang.php");
        }

        public function chitiet($ma_kh) {
            $ma_donhang = $_GET['id'];
            $user = $this->userControl->getUser($_SESSION['ma_kh']); // hàm lấy thông tin user
            $result = $this->donhangControl->getDonHangChiTiet($ma_donhang);
            
            $result1 = $this->donhangControl->getDonHangChiTiet1($ma_donhang);

            var_dump($this->donhangControl->getTrangThaiDonHang($ma_donhang));
            include("view/chitietdonhang.php");
        }

        public function huydon() {
            if (isset($_POST['btn_huydon'])) {

                $trangthai = $this->donhangControl->getTrangThaiDonHang($_POST['ma_donhang']);
                if ($trangthai['TRANGTHAI'] === "Đã xác nhận" || $trangthai['TRANGTHAI']  === "Đang giao" || $trangthai['TRANGTHAI']  === "Thành công") {
                    echo "<script>alert('Không thể hủy vì đơn hàng đã được xác nhận');
                    window.location.href = '?act=donhang';
                    </script>";
                }
                else {
                $this->donhangControl->huydon($_POST['ma_donhang'], $_POST['lidohuydon']);
                header("Location: ?act=donhang");
                exit();
                }
            }
        }

        public function trahang() {
            if (isset($_POST['btn_trahang'])) {
                $ma_donhang = $_POST['ma_donhang'];
                $ghichu = $_POST['lidotrahang'];
                $this->donhangControl->trahang($ma_donhang, $ghichu);
                echo "<script>alert('Yêu cầu trả hàng đã được gửi. Xin vui lòng chờ đợi !')
                window.location.href = '?act=donhang'
                </script>";
            }
            
        }
    }
?>