<?php
    class userQuery {
        public $db;

        public function __construct() {
            $this->db = connectDB();
        }

        public function __destruct() {
            $this->db = NULL;
        }

        public function getUser($id) {
            try {
                $sql = "SELECT * FROM `khachhang` WHERE `MA_KH` = $id";
                $data = $this->db->query($sql)->fetch();
                return $data;
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function updateUser($name, $email, $diachi, $sdt, $ma_kh) {
            try {
                $sql = "UPDATE `khachhang` SET `NAME` = '$name', `EMAIL` = '$email', `DIACHI` = '$diachi', `SDT` = '$sdt'
                WHERE `MA_KH` = $ma_kh;";
                $data = $this->db->exec($sql);
                return $data;
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>