<?php
    class thuonghieu {
        public $ma_th;
        public $name;
    }

    class khachhang {
        public $ma_kh;
        public $name;
        public $email;
        public $password;
        public $diachi;
        public $sdt;
    }

    class binhluan{
        public $ma_bl;
        public $ma_sp;
        public $ma_kh;
        public $binhluan;
        public $ngaybinhluan;
        public $trangthai;
    }


    class giohang_items{
        public $ma_gh_item;
        public $ma_kh;
        public $ma_sp;
        public $ma_dh;
    }

    class sanpham {
        public $id;
        public $ma_sp;
        public $name;
        public $mota;
        public $gia;
        public $soluong;
        public $image;
        public $ma_th;
        public $trangthai;
    }

    
    class donhang {
        public $ma_dh;
        public $ma_kh;
        public $ngayhoanthanh;
        public $diachi;
        public $tong;
        public $trangthai;
        public $ghichu;
    }
?>