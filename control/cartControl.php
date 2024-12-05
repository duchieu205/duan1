<?php
   
    class cartControl {
        public $cartControl;
        public $queryControl;
        public $userControl;
        public $donhangControl;


        public function __construct() {
            $this->cartControl = new CartQuery;
            $this->queryControl = new Query;
            $this->userControl = new userQuery;
            $this->donhangControl = new donhangQuery;
        }
       
        public function __destruct() {
            $this->cartControl = null;
        }

    
        public function cart() {
            // echo $_SESSION['ma_kh']; // id khách hàng
            $ma_kh = $_SESSION['ma_kh'] ?? NULL;
            $result1 = [];
            $result = $this->cartControl->mycart(); 
     
            $myCart = $this->cartControl->getMaKHCart($ma_kh); // check mã khách hàng tồn tại trong giohang

            if (!$myCart) {
                $this->cartControl->createCart($ma_kh);
                $myCart = $this->cartControl->getMaKHCart($ma_kh);
            }


            if (isset($_POST['btn_submit']) && isset($_POST['ma_sanpham'])) {
                $ma_sp = $this->queryControl->chitietProduct($_POST['ma_sanpham']);    // lấy sản phẩm từ db
                $soluong = (int)$_POST['quantity']; // lấy số lượng từ form
                $ma_kh = $_SESSION['ma_kh']; // lấy mã khách hàng
                // $ma_donhang = $result; 

                $product = $this->cartControl->checkCart($ma_kh, $ma_sp[0]->ma_sp);

                $checkSoLuong = $ma_sp[0]->soluong;
                
                if ($product) {
                    $newSoluong = $product['SOLUONG'] + $soluong;
                    if ($newSoluong > $checkSoLuong) {
                        echo "<script>alert('Số lượng muốn mua vượt quá số lượng trong kho!');</script>";
                        $newSoluong = $checkSoLuong;
                    }
                    $this->cartControl->updateSoLuong($ma_kh, $ma_sp[0]->ma_sp, $newSoluong);
                }
                else {
                    if ($soluong > $checkSoLuong) {
                        echo "<script>alert('Số lượng muốn mua vượt quá số lượng trong kho!');</script>";
                        $soluong = $checkSoLuong;
                    }
                 
                    $result1[] = $this->cartControl->addCart($ma_sp[0]->ma_sp, $ma_kh, $soluong);  // thêm vào giỏ hàng
                }
                
                $result = $this->cartControl->mycart(); 
            }
        
            // submit đặt hàng
            
            $user = $this->userControl->getUser($ma_kh); // hàm lấy thông tin user
            include("view/cart.php");
        }
        
        public function deleteCart($id) {
            $result = $this->cartControl->deleteCart($id);
            header("Location: ?act=cart");
            exit();
        }
        }
    ?>
