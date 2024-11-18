<?php
    class thuonghieu {
        public $ma_th;
        public $name;
    }

    class khachhang {
        public $ma_th;
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
    }

    class giohang{
        public $ma_gh;
        public $ma_kh;
        public $ngaydathang;
        public $trangthai;
    }

    class giohang_items{
        public $ma_gh_item;
        public $ma_kh;
        public $ma_sp;
        public $soluong;
        public $gia;
    }

    class sanpham {
        public $ma_sp;
        public $name;
        public $mota;
        public $gia;
        public $soluong;
        public $image;
        public $ma_th;
        public $trangthai;
    }

    class mau_sp {
        public $ma_mau;
        public $ma_sp;
        public $mau;
        public $image;
        public $soluong;
    }
    
    class khuyenmai {
        public $ma_km;
        public $name;   
        public $ngaybatdau;
        public $ngayketthuc;
        public $ma_giohang;
        public $giamgia;
        public $mota;
    }

    class dungluong_sp{
        public $ma_dungluong;
        public $ma_sp;
        public $mau_sp;
        public $dungluong;
        public $gia;
        public $soluong;
    }

    class donhang {
        public $ma_dh;
        public $ma_giohang;
        public $ma_kh;
        public $ma_km;
        public $ngayhoanthanh;
        public $phuongthuc;
        public $diachi;
        public $tong;
    }
?>