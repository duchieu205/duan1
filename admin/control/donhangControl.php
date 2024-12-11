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
            // $user = $this->userControl->getUserID()
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

        public function xacnhantrahang($id) {
            $this->donhangControl->xacnhanTraHang($id);
            echo "<script>alert('Thành công')
            window.location.href = '?act=donhang'</script>";
        }

        public function tuchoitrahang($id) {
            $this->donhangControl->tuchoiTraHang($id);
            echo "<script>alert('Thành công')
            window.location.href = '?act=donhang'</script>";
        }



        public function donhang_dahuy() {
            $result = $this->donhangControl->donhang_dahuy();

            include("view/donhangdahuy.php");
        }


        public function donhang_choxuli() {
            $result = $this->donhangControl->donhang_choxuli();
            include("view/donhangchoxuli.php");

        }

        public function donhang_daxacnhan() {
            $result = $this->donhangControl->donhang_daxacnhan();
            include("view/donhangdaxacnhan.php");
        }

        public function donhang_danggiao() {
            $result = $this->donhangControl->donhang_danggiao();
            include("view/donhangdanggiao.php");
        }

        public function donhang_thanhcong() {
            $result = $this->donhangControl->donhang_thanhcong();
            include("view/donhangthanhcong.php");
        }

        public function donhang_tra() {
            $result = $this->donhangControl->donhang_tra();
            include("view/donhangtra.php");
        }

        public function donhang_choxacnhantra() {
            $result = $this->donhangControl->donhang_choxacnhantra();
            include("view/donhangchoxacnhantra.php");
        }
        public function donhang_tuchoi() {
            $result = $this->donhangControl->donhang_tuchoi();
            include("view/donhangtuchoi.php");
        }
    }
?>