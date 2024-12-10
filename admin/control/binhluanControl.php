<?php
    class binhluanControl {
        public $binhluanControl;

        public function __construct() {
            $this->binhluanControl = new binhluanQuery;
        }

        public function __destruct() {
            $this->binhluanControl = null;
        }

        public function binhluan($id) {
            $result = $this->binhluanControl->getBinhLuan($id);
            include("view/binhluan.php");
        }

        public function updateBinhLuan() {
            if (isset($_POST['btn_binhluan'])) {
                $ma_sp = $_POST['ma_sp'];
                $this->binhluanControl->updateBinhLuan($_POST['ma_binhluan']);
                echo "<script>alert('Đã duyệt')
                window.location.href = '?act=binhluan&id=$ma_sp'</script>";
            }
        }
    }
?>