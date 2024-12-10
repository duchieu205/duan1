<?php
    class binhluanControl {
        public $binhluanControl;

        public function __construct() {
            $this->binhluanControl = new binhluanQuery;


        }

        public function __destruct() {
            $this->binhluanControl = NULL;
        }

        public function binhluan($id) {
            if (isset($_POST['btn_binhluan'])) {
                $this->binhluanControl->addBinhLuan($_POST['ma_sp'], $_SESSION['ma_kh'], $_POST['comment']);
                $ma_sp = $_POST['ma_sp'];
                echo "<script>alert('Bình luận đã được gửi. Xin vui lòng chờ duyệt')
                window.location.href = '?act=detail&id=$ma_sp'</script>";
            }
        }

    }
?>