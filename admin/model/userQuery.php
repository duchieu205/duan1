<?php 
    class userQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {
            $this->pdo = NULL;
        }

        public function listUser() {
            try {
                $sql = "SELECT * FROM `khachhang`";
                $data = $this->pdo->query($sql)->fetchAll();
                $userlist = [];
                foreach ($data as $ds) {
                    $user = new khachhang;
                    $user->ma_kh = $ds['MA_KH'];
                    $user->name = $ds['NAME'];
                    $user->email = $ds['EMAIL'];
                    $user->password = $ds['MATKHAU'];
                    $user->diachi = $ds['DIACHI'];
                    $user->sdt = $ds['SDT'];
                    $userlist[] = $user;
                }
                return $userlist;
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function deleteUser($id) {
            try{
                $sql = "DELETE FROM `khachhang` WHERE `MA_KH` = $id;";
                $data = $this->pdo->exec($sql);
                return $data;
            }

            catch (Exception $e) {
                return $e->getMessage();
            }
        }

        
    } 
?>