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

        // public function updateUser($id) {
        //     try {
        //         $sql = "UPDATE `khachhang` SET (NAME, EMAIL, DIACHI, SDT)
        //         VALUES ('')"
        //     }

        //     catch (Exception $e) {
        //         return $e->getMessage();
        //     }
        // }
    }
?>