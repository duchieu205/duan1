<?php
   
    class cartControl {
        public $cartControl;

        public function __construct() {
            $this->cartControl = new CartQuery;
        }
       
        public function __destruct() {
            $this->cartControl = null;
        }

    
        public function cart() {
            $result = $this->cartControl->mycart(); // id giỏ hàng
            // echo $_SESSION['ma_kh']; // id khách hàng
            var_dump($result);
            include("view/cart.php");
        }
        

        }
    ?>
