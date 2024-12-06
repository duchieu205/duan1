<?php
    class donhangControl {
        public $donhangControl;
        public $userControl;


        public function __construct() {
            $this->donhangControl = new donhangQuery;
            $this->userControl = new userQuery;
        }

        public function __destruct() {
            $this->donhangControl = NULL;
        }

        public function list() {
            $result = $this->donhangControl->getDonHang();
            include("view/donhang.php");
        }

        public function chitiet($ma_kh) {
            $ma_donhang = $_GET['id'];
            $result = $this->donhangControl->getDonHangChiTiet($ma_donhang);

            $result1 = $this->donhangControl->getDonHangChiTiet1($ma_donhang);
            include("view/chitietdonhang.php");
        }

        public function trangthai($id) {
            $result = $this->donhangControl->getTrangThaiDonHang($id);
            // echo "<pre>";
            // print_r($result);
            //     "</pre>";
            include ("view/updateDonhang.php");
        }

        public function updateTrangThai($id) {
            $result = $this->donhangControl->getTrangThaiDonHang($id);
            var_dump($result['TRANGTHAI']);
            if (isset($_POST['submit_trangthai'])) {
                $newTrangThai = $_POST['new_trangthai'];
                $trangthaiHienTai = $result['TRANGTHAI'];
                // Định nghĩa trình tự trạng thái

                $stt = [
                    'Chờ xử lí' => 'Đã xác nhận',
                    'Đã xác nhận' => 'Đang giao',
                    'Đang giao' => 'Thành công'
                ];


                if (!isset($stt[$trangthaiHienTai]) || $stt[$trangthaiHienTai] !== $newTrangThai) {
                    echo "<script>
                        alert('Không thể chuyển trạng thái này!');
                        window.location.href = '?act=donhang';    
                    </script>";
                }
                else {

                $this->donhangControl->updateTrangThai($newTrangThai, $result['MA_DONHANG']);
                echo 
                "<script>
                    alert('Thay đổi trạng thái thành công')
                    window.location.href = '?act=donhang';
                </script>";
                }
                
            }
        }
    }
?>